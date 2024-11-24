import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
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

    // Contador para generar IDs únicos para cada conjunto de ubicaciones dinámicas
    let ubiCounter = 1;

    // Función para agregar una nueva ubicación
    function addUbi() {
        // Contenedor principal donde se agregan las ubicaciones
        const container = document.getElementById('ubisContainer');
        
        // Seleccionar el primer conjunto de ubicación para clonar
        const firstUbi = container.querySelector('.ubi-field');
        
        if (firstUbi) {
            // Clonar el conjunto de campos
            const newUbi = firstUbi.cloneNode(true);

            // Incrementar el contador y ajustar IDs y nombres únicos para evitar conflictos
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

            // Agregar el nuevo conjunto al contenedor
            container.appendChild(newUbi);
        }
    }
});