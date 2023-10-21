let carrito = {};

        document.querySelectorAll(".agregar-al-carrito").forEach(button => {
            button.addEventListener("click", () => {
                const producto = button.getAttribute("data-producto");
                if (carrito[producto]) {
                    carrito[producto] += 1;
                } else {
                    carrito[producto] = 1;
                }
                actualizarContador();
                actualizarCarrito();
            });
        });

        document.querySelectorAll(".eliminar-del-carrito").forEach(button => {
            button.addEventListener("click", () => {
                const producto = button.getAttribute("data-producto");
                if (carrito[producto] && carrito[producto] > 0) {
                    carrito[producto] -= 1;
                    if (carrito[producto] === 0) {
                        delete carrito[producto];
                    }
                    actualizarContador();
                    actualizarCarrito();
                }
            });

        });

        function actualizarContador() {
            const contadorSpan = document.querySelector('.contador span');
            contadorSpan.innerText = Object.keys(carrito).length > 0 ? Object.values(carrito).reduce((a, b) => a + b) : 0;
        }

        function actualizarCarrito() {
            const carritoLista = document.querySelector('.carrito-lista');
            carritoLista.innerHTML = "";
            Object.keys(carrito).forEach(producto => {
                const li = document.createElement('li');
                const img = document.createElement('img');
                img.src = `https://lavaquita.co/cdn/shop/products/${producto.toLowerCase()}.png`;
                img.alt = producto;
                img.width = 50;
                img.height = 50;
                const span = document.createElement('span');
                span.innerText = `(${carrito[producto]})`;
                li.appendChild(img);
                li.appendChild(span);
                carritoLista.appendChild(li);
            });
        }
