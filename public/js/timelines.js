const exceptionsNoWorkDays = []

function addDay() {
    let exceptionsDiv = document.getElementById('exception-no-work-days')
    let qntChildren = exceptionsDiv.children.length

    let exampleField = document.getElementById('exception-day-field-example')

    let exampleSelect = document.getElementById('exception-day-select-example')

    let cloneField = exampleField.cloneNode()
    cloneField.setAttribute('id', `exception-day-field-${qntChildren - 1}`)
    cloneField.classList.remove('tw-hidden')
    cloneField.classList.add('tw-flex')

    let cloneSelect = exampleSelect.cloneNode(true)
    cloneSelect.setAttribute('id', `exception-day-select-${qntChildren - 1}`)
    cloneSelect.setAttribute('name', `exception-day-select-${qntChildren - 1}`)

    cloneField.appendChild(cloneSelect)

    let exampleTextareaBox = document.getElementById('exception-day-textarea-box-example')
    let cloneTextareaBox = exampleTextareaBox.cloneNode()
    cloneTextareaBox.setAttribute('id', `exception-day-textarea-box-${qntChildren - 1}`)

    let exampleTextareaLabel = document.getElementById('exception-day-label-textarea-example')
    let cloneTextareaLabel = exampleTextareaLabel.cloneNode(true)
    cloneTextareaLabel.setAttribute('id', `exception-day-label-textarea-${qntChildren - 1}`)
    cloneTextareaLabel.setAttribute('for', `exception-day-textarea-${qntChildren - 1}`)

    let exampleSpanTextarea = document.getElementById('exception-day-span-textarea-example')
    let cloneSpanTextarea = exampleSpanTextarea.cloneNode()
    cloneSpanTextarea.setAttribute('id', `exception-day-span-textarea-${qntChildren - 1}`)

    let exampleTextarea = document.getElementById('exception-day-textarea-example')
    let cloneTextarea = exampleTextarea.cloneNode()
    cloneTextarea.setAttribute('id', `exception-day-textarea-${qntChildren - 1}`)

    cloneSpanTextarea.appendChild(cloneTextarea)

    cloneTextareaBox.appendChild(cloneTextareaLabel)
    cloneTextareaBox.appendChild(cloneSpanTextarea)

    cloneField.appendChild(cloneTextareaBox)
    
    exceptionsDiv.appendChild(cloneField)
}

function removeDay() {
    let exceptionsDiv = document.getElementById('exception-no-work-days')
    let qntChildren = exceptionsDiv.children.length

    if (qntChildren > 2) {
        let lastDay = exceptionsDiv.lastChild

        exceptionsDiv.removeChild(lastDay)
    }
}