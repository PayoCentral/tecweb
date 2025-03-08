// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/imagen.png"
};

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON, null, 2);
    $('#description').val(JsonString);

    // SE LISTAN TODOS LOS PRODUCTOS NO ELIMINADOS AL ABRIR LA PÁGINA
    listarProductos();
}

// FUNCIÓN PARA LISTAR PRODUCTOS NO ELIMINADOS
function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        dataType: 'json',
        success: function(productos) {
            let template = '';
            productos.forEach(producto => {
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>
                `;
                template += `
                    <tr productId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                `;
            });
            $('#products').html(template);
        }
    });
}

// FUNCIÓN PARA BUSCAR PRODUCTOS NO ELIMINADOS
$('#search').on('input', function(e) {
    e.preventDefault();
    let search = $('#search').val().trim();

    if (search === "") {
        listarProductos(); // Si está vacío, vuelve a mostrar todos los productos
        return;
    }

    console.log("Buscando:", search);

    $.ajax({
        url: './backend/product-search.php',
        type: 'GET',
        data: { search: search },
        dataType: 'json',
        success: function(productos) {
            console.log("Productos encontrados:", productos);

            let template = '';
            let template_bar = '';

            productos.forEach(producto => {
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>
                `;
                template += `
                    <tr productId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-delete btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                `;
                template_bar += `<li>${producto.nombre}</li>`;
            });

            $('#product-result').removeClass('d-none');
            $('#container').html(template_bar);
            $('#products').html(template);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en AJAX:", textStatus, errorThrown);
            console.error("Respuesta del servidor:", jqXHR.responseText);
        }
    });
});


// FUNCIÓN PARA AGREGAR PRODUCTO
$('#product-form').submit(function(e) {
    e.preventDefault();
    
    let productoJsonString = $('#description').val();
    let finalJSON;

    try {
        finalJSON = JSON.parse(productoJsonString);
    } catch (error) {
        console.error("Error: JSON inválido", error);
        return;
    }

    finalJSON['nombre'] = $('#name').val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    console.log("Enviando datos:", productoJsonString);

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        data: productoJsonString,
        contentType: 'application/json; charset=UTF-8',
        dataType: 'json',
        success: function(respuesta) {
            console.log("Respuesta recibida:", respuesta);
            
            // Construir mensaje de estado
            let template_bar = `
                <li style="list-style: none; font-weight: bold;">Status: ${respuesta.status}</li>
                <li style="list-style: none;">Message: ${respuesta.message}</li>
            `;

            // Hacer visible la barra de estado y actualizar el contenido
            $('#product-result').removeClass('d-none');
            $('#container').html(template_bar);

            // Recargar lista de productos después de agregar
            listarProductos();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en AJAX:", textStatus, errorThrown);
            console.error("Respuesta del servidor:", jqXHR.responseText);

            // Mostrar mensaje de error en la misma barra de estado
            let template_bar = `
                <li style="list-style: none; font-weight: bold;">Status: error</li>
                <li style="list-style: none;">Message: No se pudo agregar el producto</li>
            `;
            $('#product-result').removeClass('d-none');
            $('#container').html(template_bar);
        }
    });
});



// FUNCIÓN PARA ELIMINAR PRODUCTO
$(document).on('click', '.product-delete', function() {
    if (confirm("De verdad deseas eliminar el Producto")) {
        let id = $(this).closest('tr').attr('productId');
        $.ajax({
            url: './backend/product-delete.php',
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(respuesta) {
                let template_bar = `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
                $('#product-result').removeClass('d-none');
                $('#container').html(template_bar);
                // CARGAR TODA LA LISTA DE PRODUCTOS NO ELIMINADOS AL PRESIONAR "Eliminar"
                listarProductos();
            }
        });
    }
});

// INICIALIZAR LA FUNCIÓN INIT AL CARGAR LA PÁGINA
$(document).ready(init);