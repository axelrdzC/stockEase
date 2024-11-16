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