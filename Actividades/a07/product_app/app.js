// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function(){
    let edit = false;
    let JsonString = JSON.stringify(baseJSON, null, 2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: 'backend/myapi/Products.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                const productos = response;
                if(productos && productos.length > 0) {
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
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#products').html(template);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    }

    $('#product-form').submit(function(e) {
        e.preventDefault();
        
        // Crear objeto con los datos del formulario
        const productData = {
            nombre: $('#name').val(),
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            precio: parseFloat($('#precio').val()),
            unidades: parseInt($('#unidades').val()),
            detalles: $('#detalles').val(),
            imagen: $('#imagen').val() || 'img/default.png'
        };
    
        // Validación básica
        if (!productData.nombre || !productData.precio) {
            alert('Nombre y precio son campos requeridos');
            return;
        }
    
        $.ajax({
            url: 'backend/myapi/Products.php?action=add',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(productData),
            success: function(response) {
                try {
                    const result = JSON.parse(response);
                    alert(result.message);
                    listarProductos();
                    resetForm();
                } catch (e) {
                    console.error('Error parsing response:', e);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    });
    
    function resetForm() {
        $('#name').val('');
        $('#marca').val('');
        $('#modelo').val('XX-000');
        $('#precio').val('0.0');
        $('#unidades').val('1');
        $('#detalles').val('NA');
        $('#imagen').val('img/default.png');
        edit = false;
    }

    $(document).on('click', '.product-delete', function() {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const id = $(this).closest('tr').attr('productId');
            $.ajax({
                url: 'backend/myapi/Products.php?action=delete',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({id: id}),
                success: function() {
                    listarProductos();
                }
            });
        }
    });

    $(document).on('click', '.product-item', function(e) {
        e.preventDefault();
        const id = $(this).closest('tr').attr('productId');
        $.get('backend/myapi/Products.php?action=single&id=' + id, function(response) {
            let product = JSON.parse(response);
            $('#name').val(product.nombre);
            $('#productId').val(product.id);
            
            // Eliminar campos que no son parte del JSON base
            delete product.nombre;
            delete product.id;
            delete product.eliminado;
            
            $('#description').val(JSON.stringify(product, null, 2));
            edit = true;
        });
    });
});