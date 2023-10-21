import sys

def imprimir_primeras_n_lineas(archivo, n):
    try:
        with open(archivo, 'r') as file:
            lineas = file.readlines()

            if n > len(lineas):
                print(f"Lo siento, la cantidad {n} de líneas que ingresaste es mayor que las que existen en el archivo.")
                return

            for i in range(n):
                print(lineas[i], end='')
    except FileNotFoundError:
        print(f"Error: El archivo '{archivo}' no fue encontrado.")
    except Exception as e:
        print(f"Error inesperado: {e}")

if __name__ == "__main__":
    # Solicitar al usuario el nombre del archivo y la cantidad de líneas a imprimir
    archivo = input("Ingrese el nombre del archivo: ")
    try:
        n = int(input("Ingrese la cantidad de líneas a imprimir: "))
    except ValueError:
        print("Error: Por favor, ingrese un número entero para la cantidad de líneas.")
        sys.exit(1)

    imprimir_primeras_n_lineas(archivo, n)

