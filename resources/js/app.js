import './bootstrap';
import bootstrapBundleMin from 'bootstrap/dist/js/bootstrap.bundle.min';
import ApexCharts from 'apexcharts';
window.ApexCharts = ApexCharts;

document.addEventListener('DOMContentLoaded', function() {

    function removeSeccion(button) {
        const seccion = button.closest('.seccion-field');
        if (seccion) {
            seccion.remove();
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
    
    
    // add un nuevo campo de seccion
    let seccionConter = 1;
    function addSeccion() {
        // contenedor
        const container = document.getElementById('secciones-container');
        const ogSeccion = container.querySelector('.seccion-field');
        
        if (ogSeccion) {
            // clonanding
            const newSeccion = ogSeccion.cloneNode(true);

            seccionConter++;
            const selectField = newSeccion.querySelector('#seccion_name');
            const inputField = newSeccion.querySelector('#seccion_capacidad');

            // Actualizar los atributos para que sean únicos
            selectField.id = `seccion_name_${seccionConter}`;
            selectField.name = `seccion_name_${seccionConter}`;
            inputField.id = `seccion_capacidad_${seccionConter}`;
            inputField.name = `seccion_capacidad_${seccionConter}`;

            // Limpiar valores de los campos para el nuevo conjunto
            selectField.value = '';
            inputField.value = '';

            container.appendChild(newSeccion);
        }
    }

    window.addSeccion = addSeccion;

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
});