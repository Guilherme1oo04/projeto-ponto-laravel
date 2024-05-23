function addDay(numDias) {
    let exceptionsDiv = document.getElementById('exception-no-work-days')
    let qntChildren = exceptionsDiv.children.length

    if ((qntChildren - 2) < numDias) {
        let exampleField = document.getElementById('exception-day-field-example')

        let exampleSelect = document.getElementById('exception-day-select-example')

        let cloneField = exampleField.cloneNode()
        cloneField.setAttribute('id', `exception-day-field-n${qntChildren - 1}`)
        cloneField.classList.remove('tw-hidden')
        cloneField.classList.add('tw-flex')

        let cloneSelect = exampleSelect.cloneNode(true)
        cloneSelect.setAttribute('id', `exception-day-select-n${qntChildren - 1}`)
        cloneSelect.setAttribute('name', `exception-day-select-n${qntChildren - 1}`)

        cloneField.appendChild(cloneSelect)

        let exampleTextareaBox = document.getElementById('exception-day-textarea-box-example')
        let cloneTextareaBox = exampleTextareaBox.cloneNode()
        cloneTextareaBox.setAttribute('id', `exception-day-textarea-box-n${qntChildren - 1}`)

        let exampleTextareaLabel = document.getElementById('exception-day-label-textarea-example')
        let cloneTextareaLabel = exampleTextareaLabel.cloneNode(true)
        cloneTextareaLabel.setAttribute('id', `exception-day-label-textarea-n${qntChildren - 1}`)
        cloneTextareaLabel.setAttribute('for', `exception-day-textarea-n${qntChildren - 1}`)

        let exampleSpanTextarea = document.getElementById('exception-day-span-textarea-example')
        let cloneSpanTextarea = exampleSpanTextarea.cloneNode()
        cloneSpanTextarea.setAttribute('id', `exception-day-span-textarea-n${qntChildren - 1}`)

        let exampleTextarea = document.getElementById('exception-day-textarea-example')
        let cloneTextarea = exampleTextarea.cloneNode()
        cloneTextarea.setAttribute('id', `exception-day-textarea-n${qntChildren - 1}`)
        cloneTextarea.setAttribute('name', `exception-day-textarea-n${qntChildren - 1}`)

        cloneSpanTextarea.appendChild(cloneTextarea)

        cloneTextareaBox.appendChild(cloneTextareaLabel)
        cloneTextareaBox.appendChild(cloneSpanTextarea)

        cloneField.appendChild(cloneTextareaBox)

        let exampleRemoveButton = document.getElementById('exception-day-remove-button-example')
        let cloneRemoveButton = exampleRemoveButton.cloneNode(true)
        cloneRemoveButton.setAttribute('id', `exception-day-remove-button-n${qntChildren - 1}`)
        cloneRemoveButton.setAttribute('onclick', `removeDay(${qntChildren - 1})`)

        cloneField.appendChild(cloneRemoveButton)
        
        exceptionsDiv.appendChild(cloneField)
    }
}

function removeDay(numDiv) {
    let exceptionsDiv = document.getElementById('exception-no-work-days')
    let qntChildren = exceptionsDiv.children.length

    if (qntChildren > 2) {
        let divToRemove = document.getElementById(`exception-day-field-n${numDiv}`)

        divToRemove.parentNode.removeChild(divToRemove)

        let exceptionDayFields = document.querySelectorAll('div[id^="exception-day-field-n"]')
        let exceptionDaySelects = document.querySelectorAll('select[id^="exception-day-select-n"]')
        let exceptionDayTextareaBoxes = document.querySelectorAll('div[id^="exception-day-textarea-box-n"]')
        let exceptionDayTextareaLabels = document.querySelectorAll('label[id^="exception-day-label-textarea-n"]')
        let exceptionDayTextareaSpans = document.querySelectorAll('span[id^="exception-day-span-textarea-n"]')
        let exceptionDayTextareas = document.querySelectorAll('textarea[id^="exception-day-textarea-n"]')
        let exceptionDayRemoveButtons = document.querySelectorAll('button[id^="exception-day-remove-button-n"]')

        for (let i = 0; i < qntChildren - 3; i++) {
            exceptionDayFields[i].setAttribute('id', `exception-day-field-n${i + 1}`)

            exceptionDaySelects[i].setAttribute('id', `exception-day-select-n${i + 1}`)
            exceptionDaySelects[i].setAttribute('name', `exception-day-select-n${i + 1}`)

            exceptionDayTextareaBoxes[i].setAttribute('id', `exception-day-textarea-box-n${i + 1}`)

            exceptionDayTextareaLabels[i].setAttribute('id', `exception-day-label-textarea-n${i + 1}`)
            exceptionDayTextareaLabels[i].setAttribute('for', `exception-day-textarea-n${i + 1}`)

            exceptionDayTextareaSpans[i].setAttribute('id', `exception-day-span-textarea-n${i + 1}`)

            exceptionDayTextareas[i].setAttribute('id', `exception-day-textarea-n${i + 1}`)
            exceptionDayTextareas[i].setAttribute('name', `exception-day-textarea-n${i + 1}`)

            exceptionDayRemoveButtons[i].setAttribute('id', `exception-day-remove-button-n${i + 1}`)
            exceptionDayRemoveButtons[i].setAttribute('onclick', `removeDay(${i + 1})`)
        }
    }
}

function hoursFormatter(id) {
    let input = document.getElementById(id)

    input.value = input.value.replace(/[^0-9]/g, '').slice(0, 2)

    if(parseInt(input.value) < 1) {
        input.value = 1
    }

    if(parseInt(input.value) > 44) {
        input.value = 44
    }
}

document.getElementById('form-timeline').addEventListener('submit', (event) => {
    let weekDaysNonWorkChecked = document.querySelectorAll('input[name="weekDaysNonWork[]"]:checked')
    let exceptionsDaysCreated = document.querySelectorAll('select[name="exception-day-select-n"]')

    if (weekDaysNonWorkChecked.length == 0 && exceptionsDaysCreated.length == 0) {
        event.preventDefault()
        alert('É necessário adicionar um dia da semana padrão ou um dia específico sem trabalho')
    }
})