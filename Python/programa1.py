import sys
import os
import mysql.connector
from mysql.connector import Error
from fpdf import FPDF
import datetime
from flask import Flask, render_template, send_from_directory

app = Flask(__name__)

def conectar_bd():
    try:
        conexion = mysql.connector.connect(
            host='localhost',
            database='datosdb',
            user='mysqldb',
            password='felipehernandez1'
        )
        return conexion
    except Error as e:
        print(f"Error de conexión a la base de datos: {e}")
        return None

def procesar_archivo_y_guardar(archivo):
    try:
        # Conectar a la base de datos MySQL
        conexion = conectar_bd()

        if conexion.is_connected():
            cursor = conexion.cursor()

            # Crear la tabla si no existe
            cursor.execute("""
                CREATE TABLE IF NOT EXISTS informacion (
                    codigo INTEGER AUTO_INCREMENT PRIMARY KEY,
                    nombrearchivo VARCHAR(250),
                    cantlineas INTEGER,
                    cantpalabras INTEGER,
                    cantcaracteres INTEGER,
                    fecharegistro TIMESTAMP
                )
            """)

            # Leer el archivo y procesar la información
            with open(archivo, 'r') as file:
                contenido = file.read()
                cant_lineas = len(contenido.splitlines())
                cant_palabras = len(contenido.split())
                cant_caracteres = len(contenido)

                # Obtener el nombre del archivo sin la ruta completa
                nombre_archivo = os.path.basename(archivo)

                # Insertar la información en la base de datos
                cursor.execute("""
                    INSERT INTO informacion (nombrearchivo, cantlineas, cantpalabras, cantcaracteres, fecharegistro)
                    VALUES (%s, %s, %s, %s, %s)
                """, (nombre_archivo, cant_lineas, cant_palabras, cant_caracteres, datetime.datetime.now()))

                # Confirmar la transacción
                conexion.commit()

                print("Información procesada y guardada en la base de datos.")

    except Error as e:
        print(f"Error: {e}")
    finally:
        # Cerrar la conexión a la base de datos
        if conexion.is_connected():
            cursor.close()
            conexion.close()

@app.route('/')
def index():
    conexion = conectar_bd()
    if not conexion:
        return "Error de conexión a la base de datos."

    try:
        cursor = conexion.cursor(dictionary=True)
        cursor.execute("SELECT * FROM informacion")
        registros = cursor.fetchall()
    except Error as e:
        print(f"Error al obtener registros: {e}")
        registros = []

    return render_template('index.html', registros=registros)

@app.route('/generar_pdf')
def generar_pdf():
    conexion = conectar_bd()
    if not conexion:
        return "Error de conexión a la base de datos."

    try:
        cursor = conexion.cursor(dictionary=True)
        cursor.execute("SELECT * FROM informacion")
        registros = cursor.fetchall()

        pdf = FPDF()
        pdf.add_page()
        pdf.set_font("Arial", size=12)

        for registro in registros:
            pdf.cell(0, 10, str(registro), ln=True)

        pdf_output = "static/informacion.pdf"
        pdf.output(pdf_output)

        return send_from_directory('static', 'informacion.pdf')
    except Error as e:
        print(f"Error al generar PDF: {e}")
        return "Error al generar PDF."

if __name__ == '__main__':
    # Verificar si se proporciona un archivo como argumento
    if len(sys.argv) != 2:
        print("Uso: python programa.py <archivo.txt>")
        sys.exit(1)

    archivo = sys.argv[1]

    # Procesar el archivo y guardar en la base de datos
    procesar_archivo_y_guardar(archivo)

    # Ejecutar la aplicación Flask
    app.run(debug=True)
