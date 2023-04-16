function toggleRadio(radio) {
    if (radio.previousCheckedState === undefined) {
        radio.previousCheckedState = false;
    }
    if (radio.previousCheckedState) {
        radio.checked = false;
        radio.previousCheckedState = false;
    } else {
        radio.previousCheckedState = true;
    }
}