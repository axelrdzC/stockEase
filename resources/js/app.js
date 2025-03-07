import './bootstrap';
import bootstrapBundleMin from 'bootstrap/dist/js/bootstrap.bundle.min';
import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;

document.addEventListener('DOMContentLoaded', function() {
    
    // add un nuevo campo de seccion
    function addSeccion() {
        
        const seccionesContainer = document.getElementById('secciones-container');
    
        const currentSections = seccionesContainer.querySelectorAll('.seccion-field');
        const newIndex = currentSections.length;
    
        const newSeccion = document.createElement('div');
        newSeccion.className = 'row mb-3 seccion-field';
        newSeccion.innerHTML = `
            <div class="col-md-6">
                <label for="secciones[${newIndex}][nombre]" class="form-label">Nombre de la sección</label>
                <input type="text" class="form-control bg-white" name="secciones[${newIndex}][nombre]" placeholder="Ej. Sección ${String.fromCharCode(65 + newIndex)}">
                <button type="button" class="btn btn-outline-danger mt-3" onclick="removeSeccion(this)">Eliminar</button>
            </div>
            <div class="col-md-6">
                <label for="secciones[${newIndex}][capacidad]" class="form-label">Capacidad</label>
                <input type="number" class="form-control bg-white" name="secciones[${newIndex}][capacidad]" placeholder="Ej. 100">
            </div>
        `;
    
        seccionesContainer.appendChild(newSeccion);
    }

    window.addSeccion = addSeccion;

    function removeSeccion(button) {

        const seccionField = button.closest('.seccion-field'); 
        if (seccionField) {
            seccionField.remove();
        } else {
            console.error('No se encontró la sección a eliminar.');
        }
    }
    
    
    window.removeSeccion = removeSeccion;

    // cambiar de paso en los forms
    function switchIt(pasoActual, pasoSiguiente) {
        document.querySelector(`#paso_${pasoActual}`).style.display = 'none';
        document.querySelector(`#paso_${pasoSiguiente}`).style.display = 'block';
    
        document.querySelector(`#paso-item-${pasoActual}`).classList.remove('thisPaso', 'bg-white', 'rounded', 'fw-bold', 'shadow-sm');
        document.querySelector(`#paso-item-${pasoActual}`).classList.add('bg-transparent', 'text-muted');
    
        document.querySelector(`#paso-item-${pasoSiguiente}`).classList.add('thisPaso', 'bg-white', 'rounded', 'fw-bold', 'shadow-sm');
        document.querySelector(`#paso-item-${pasoSiguiente}`).classList.remove('bg-transparent', 'text-muted');
    
        const namePaso = document.querySelector(`#paso-item-${pasoSiguiente}`).getAttribute('data-name');
        document.querySelector('.namePaso').textContent = namePaso;
    }

    function nextStep(pasoActual, pasoSig) {
        switchIt(pasoActual, pasoSig);
    }
    
    function prevStep(pasoPrev, pasoActual) {
        switchIt(pasoPrev, pasoActual);
    }

    window.switchIt = switchIt;
    window.nextStep = nextStep;
    window.prevStep = prevStep;

    
    // add un nuevo campo de ubicacion
    let ubiCounter = 1;
    function addUbi() {
        // contenedor
        const container = document.getElementById('ubisContainer');
        const firstUbi = container.querySelector('.ubi-field');
        
        if (firstUbi) {
            // clonanding
            const newUbi = firstUbi.cloneNode(true);

            ubiCounter++;
            const selectField = newUbi.querySelector('select');
            const inputField = newUbi.querySelector('input');

            // Actualizar los atributos para que sean únicos
            selectField.id = `almacen_id_${ubiCounter}`;
            selectField.name = `almacen_id_${ubiCounter}`;
            inputField.id = `sku_${ubiCounter}`;
            inputField.name = `sku_${ubiCounter}`;

            // Limpiar valores de los campos para el nuevo conjunto
            selectField.value = '';
            inputField.value = '';

            container.appendChild(newUbi);
        }
    }

    window.addUbi = addUbi;

});

document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrapBundleMin.Tooltip(tooltipTriggerEl);
    });
});

document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('img')) {
        document.getElementById('img').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.profile-img').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const id = event.target.id.split('-')[1];
                    document.getElementById(`preview-${id}`).src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });

    // Registra la función en window
    window.redirectToSlide = function(selectedIndex, updatedLabels, carouselId) {
        // Verifica si el índice seleccionado es para "Productos sin sección"
        if (updatedLabels[selectedIndex] === "Productos sin sección") {
            // Si selecciona "Productos sin sección", muestra ese slide
            const carousel = document.getElementById(carouselId);
            const carouselInstance = new bootstrapBundleMin.Carousel(carousel);
            carouselInstance.to(updatedLabels.length - 1); // Mueve al último slide (Productos sin sección)
        } else {
            // Si selecciona cualquier otra sección, mueve al slide correspondiente
            const carousel = document.getElementById(carouselId);
            const carouselInstance = new bootstrapBundleMin.Carousel(carousel);
            carouselInstance.to(selectedIndex); // Mueve al slide correspondiente al índice
        }
    };

});

document.addEventListener('DOMContentLoaded', () => {
    const modales = document.querySelectorAll('.modal'); // Seleccionamos todos los modales

    modales.forEach(modal => {
        const navbarSeleccion = modal.querySelector('#checkboxChoices'); // Navbar dentro de cada modal
        const checkboxes = modal.querySelectorAll('.producto-checkbox'); // Checkboxes dentro de cada modal
        const productosSeleccionados = modal.querySelector('#productosSeleccionados');
        const buttons = modal.querySelectorAll('#destroyAll-btn, #moveSection-btn, #moveStore-btn');
        const dropdownToggle = modal.querySelector('#moveSectionDropdown');
        const dropdownAlmacen = modal.querySelector('#moveAlmacenDropdown');
        const productosSeleccionadosInputs = modal.querySelectorAll('.productos-seleccionados-input');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const seleccionados = [...checkboxes].filter(cb => cb.checked);
                const cantidadSeleccionados = seleccionados.length;

                // Mostrar u ocultar la navbar
                if (cantidadSeleccionados > 0) {
                    navbarSeleccion.classList.remove('d-none');
                } else {
                    navbarSeleccion.classList.add('d-none');
                }

                // Actualizar texto de productos seleccionados
                productosSeleccionados.textContent = 
                    cantidadSeleccionados === 1 
                    ? `${cantidadSeleccionados} producto seleccionado` 
                    : `${cantidadSeleccionados} productos seleccionados`;

                // Habilitar o deshabilitar los botones y el dropdown
                buttons.forEach(button => {
                    button.disabled = cantidadSeleccionados === 0;
                });

                dropdownToggle.disabled = cantidadSeleccionados === 0;
                dropdownAlmacen.disabled = cantidadSeleccionados === 0;

                // Actualizar el valor de todos los campos ocultos
                const idsSeleccionados = seleccionados.map(cb => cb.value).join(',');
                productosSeleccionadosInputs.forEach(input => {
                    input.value = idsSeleccionados;
                });
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const proveedorSelect = document.getElementById('proveedor_id');
    const productosContainer = document.getElementById('productos-container');
    const productosSelect = document.getElementById('producto_id');
    const productosOptions = productosSelect.options;

    proveedorSelect.addEventListener('change', function () {
        const proveedorId = this.value;

        if (proveedorId) {
            // Muestra el contenedor de productos
            productosContainer.style.display = 'block';

            // Filtra los productos según el proveedor seleccionado
            Array.from(productosOptions).forEach(option => {
                if (option.dataset.proveedor === proveedorId) {
                    option.style.display = 'block'; // Mostrar producto
                } else {
                    option.style.display = 'none'; // Ocultar producto
                    option.selected = false; // Deseleccionar si estaba seleccionado
                }
            });
        } else {
            // Oculta el contenedor de productos si no hay proveedor seleccionado
            productosContainer.style.display = 'none';
            productosSelect.value = ""; // Limpia las selecciones de productos
        }
    });
});
