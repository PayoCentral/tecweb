function Barra() {
    $('#product-result').show();
    $('#container').html(`<li style="list-style: none;">${mensaje}</li>`);
}

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

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos = JSON.parse(response);
                        
                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if(Object.keys(productos).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            // SE HACE VISIBLE LA BARRA DE ESTADO
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });
    
    $(document).ready(function () {
        let edit = false;
    
        $('#name').blur(validateName);
        $('#marca').blur(validateMarca);
        $('#modelo').blur(validateModelo);
        $('#precio').blur(validatePrecio);
        $('#unidades').blur(validateUnidades);
        $('#detalles').blur(validateDetalles);
        $('#imagen').blur(validateImagen);
    
        function validateName() {
            let name = $('#name').val().trim();
            let error = $('#errorNombre');
            error.text('');
    
            if (name === '' || name.length > 100) {
                error.text('El nombre es obligatorio y debe tener 100 caracteres o menos.');
                Barra('Error: Nombre inválido.');
                return false;
            } else {
                Barra('Error: Nombre inválido.');
                return true;    
            }
            
        }
    
        function validateMarca() {
            let marca = $('#marca').val();
            let error = $('#errorMarca');
            error.text('');
    
            if (marca === '') {
                error.text('La marca es obligatoria.');
                Barra('Error: Marca no válida.');
                return false;
            }
            else {
                Barra('Error: Marca no válida.');
                return true;
            }
            
        }
    
        function validateModelo() {
            let modelo = $('#modelo').val().trim();
            let modeloRegex = /^[a-zA-Z0-9]+$/;
            let error = $('#errorModelo');
            error.text('');
    
            if (modelo === '' || !modeloRegex.test(modelo) || modelo.length > 25) {
                error.text('El modelo es obligatorio, debe ser alfanumérico y tener 25 caracteres o menos.');
                Barra('Error: Modelo no válido.');
                return false;
            }
            else {
                Barra('Error: Modelo no válido.');
                return true;
            }
            
        }
    
        function validatePrecio() {
            let precio = parseFloat($('#precio').val());
            let error = $('#errorPrecio');
            error.text('');
    
            if (isNaN(precio) || precio <= 99.99) {
                error.text('El precio es obligatorio y debe ser mayor a $99.99.');
                Barra('Error: Precio no válido.');
                return false;
            }
            else {
                Barra('Error: Precio no válido.');
                return true;
            }
        }
    
        function validateUnidades() {
            let unidades = parseInt($('#unidades').val());
            let error = $('#errorUnidades');
            error.text('');
    
            if (isNaN(unidades) || unidades < 0) {
                error.text('Las unidades son obligatorias y deben ser 0 o más.');
                Barra('Error: Unidades no válidas, chécalo.');
                return false;
            }
            else {
                Barra('Error: Unidades no válidas, chécalo.');
                return true;
            }
        }
    
        function validateDetalles() {
            let detalles = $('#detalles').val();
            let error = $('#errorDetalles');
            error.text('');
    
            if (detalles.length > 250) {
                error.text('Los detalles no deben superar los 250 caracteres.');
                Barra('Error: Detalles no válidos.');
                return false;
            }
            else {
                Barra('Error: Detalles no válidos.');
                return true;
            }
        }
    
        function validateImagen() {
            let imagen = $('#imagen').val().trim();
            let error = $('#errorImagen');
            error.text('');
    
            if (imagen === '') {
                $('#imagen').val('img/imagen.png'); 
            }
            return true;
        }
    
        // VALIDACIÓN COMPLETA ANTES DE ENVIAR
        $('#product-form').submit(function (e) {
            e.preventDefault();
    
            if (!validateName() || !validateMarca() || !validateModelo() || !validatePrecio() || !validateUnidades() || !validateDetalles() || !validateImagen()) {
                return;
            }
    
            let postData = {
                id: $('#productId').val(),
                nombre: $('#name').val(),
                marca: $('#marca').val(),
                modelo: $('#modelo').val(),
                precio: $('#precio').val(),
                unidades: $('#unidades').val(),
                detalles: $('#detalles').val(),
                imagen: $('#imagen').val()
            };
    
            const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
    
            $.post(url, postData, (response) => {
                let respuesta = JSON.parse(response);
                let template_bar = `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
    
                // Limpiar los campos después de agregar/modificar
                $('#productId').val('');
                $('#name').val('');
                $('#marca').val('');
                $('#modelo').val('');
                $('#precio').val('');
                $('#unidades').val('');
                $('#detalles').val('');
                $('#imagen').val('img/imagen.img');
    
                $('#product-result').show();
                $('#container').html(template_bar);
                listarProductos();
                edit = false;
    
                // Cambiar el botón a "Agregar Producto"
                $('button.btn-primary').text("Agregar Producto");
            });
        });
    });
    

    $('#product-form').submit(e => {
        e.preventDefault();
    
        let postData = {
            id: $('#productId').val(),
            nombre: $('#name').val(),
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            precio: $('#precio').val(),
            unidades: $('#unidades').val(),
            detalles: $('#detalles').val(),
            imagen: $('#imagen').val()
        };
    
        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
    
        $.post(url, postData, (response) => {
            let respuesta = JSON.parse(response);
            let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `;
    
            $('#productId').val('');
            $('#name').val('');
            $('#marca').val('');
            $('#modelo').val('');
            $('#precio').val('');
            $('#unidades').val('');
            $('#detalles').val('');
            $('#imagen').val('');
    
            $('#product-result').show();
            $('#container').html(template_bar);
            listarProductos();
            edit = false;
    
            $('button.btn-primary').text("Agregar Producto");
        });
    });
    

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
    
        $.post('./backend/product-single.php', { id }, (response) => {
            let product = JSON.parse(response);
    
            $('#productId').val(product.id);
            $('#name').val(product.nombre);
            $('#marca').val(product.marca);
            $('#modelo').val(product.modelo);
            $('#precio').val(product.precio);
            $('#unidades').val(product.unidades);
            $('#detalles').val(product.detalles);
            $('#imagen').val(product.imagen);
    
            edit = true;
    
            // Cambiar el botón a "Modificar Producto"
            $('button.btn-primary').text("Modificar Producto");
        });
    
        e.preventDefault();
    });
    
    function Barra(mensaje) {
        $('#product-result').show();
        $('#container').html(`<li style="list-style: none;">${mensaje}</li>`);
    }
    
    
    //Corrreciones gracias a ChatGPT
    $('#name').on('input', function () {
        let nombre = $(this).val().trim();
    
        // Si el campo de nombre está vacío, no hacemos nada
        if (nombre.length === 0) {
            actualizarBarraEstado('⚠ Introduce un nombre.');
            $('#errorNombre').text('');
            return;
        }
    
    
        $.ajax({
            url: './backend/product-search.php',
            type: 'GET',
            data: { search: nombre },  
            success: function (response) {
                let productos = [];
    
                try {
                    productos = JSON.parse(response); 
                } catch (e) {
                    console.error("Error al analizar la respuesta JSON:", e);
                    actualizarBarraEstado('⚠ Error al procesar la respuesta del servidor.');
                    return;
                }
    
                if (productos.length > 0) {
                    $('#errorNombre').text('El nombre ya está registrado.');
                } else {
                    $('#errorNombre').text('El nombre no está registrado.');
                }
            },
        });
    });
    
    // Función para mostrar el mensaje en un contenedor separado
    function mostrarMensajeValidacion(mensaje) {
        $('#validacion-mensaje').text(mensaje).show();
    }
    
    
    // Función para mostrar el mensaje en un contenedor separado
    function mostrarMensajeValidacion(mensaje) {
        $('#validacion-mensaje').text(mensaje).show();
    }

      
});