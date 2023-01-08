

const container = document.querySelector(".calendar")
const date = new Date()
const actualYear = date.getFullYear()
const actualMonth = date.getMonth() + 0

const daysCount = (month = actualMonth) => {
    return new Date(actualYear, month + 1, 0).getDate()
}
const firstDayInMonth = () => {
    return new Date(actualYear, actualMonth).getDay()
}
const createPreviousDays = (daysCounter, daysFromPreviousMonth) => {
    for (let i = 0; i < daysFromPreviousMonth; i++) {
        let createdDiv = appendDays(i + 1)
        let firstDayFromPreviousMonth = daysCount(actualMonth - 1) - daysFromPreviousMonth + 1
        let pInDiv = createdDiv.getElementsByTagName('p')[0]

        createdDiv.setAttribute('id', firstDayFromPreviousMonth + i)
        createdDiv.classList.add('previousMonth')
        pInDiv.innerHTML = firstDayFromPreviousMonth + i
        daysCounter++
    }

    return daysCounter
}
const createNormalDays = (daysCounter, days) => {
    for (let i = 0; i < days; i++) {
        let createdDiv = appendDays(i + 1)

        createdDiv.setAttribute('id', i + 1)
        daysCounter++
    }

    return daysCounter
}
function createNextDays(daysCounter, maxDays) {
    for (let i = daysCounter, j = 1; i < maxDays; i++, j++) {
        let createdDiv = appendDays(i + 1)
        let pInDiv = createdDiv.getElementsByTagName('p')[0]

        createdDiv.setAttribute('id', j)
        createdDiv.classList.add('nextMonth')
        pInDiv.innerHTML = j
    }
}

function createDays(days) {
    let daysCounter = 0
    let daysFromPreviousMonth = firstDayInMonth() - 1;
    
    daysFromPreviousMonth = daysFromPreviousMonth < 0 ? daysFromPreviousMonth = 6 : daysFromPreviousMonth
    
    let maxDays = (daysFromPreviousMonth + daysCount()) > (5 * 7) ? (6 * 7) : (5 * 7)

    if (firstDayInMonth() == 1) {
        daysCounter += createNormalDays(daysCounter, days)
        createNextDays(daysCounter, maxDays)
    } else {
        daysCounter += createPreviousDays(daysCounter, daysFromPreviousMonth)
        daysCounter = createNormalDays(daysCounter, days)
        createNextDays(daysCounter, maxDays)
    }
}

const appendDays = (counter) => {
    const div = document.createElement("div")
    const p = document.createElement("p")
    div.classList.add('day')
    div.classList.add('flexBlock')

    container.appendChild(div);
    div.appendChild(p)
    p.innerHTML = counter

    return div
}

createDays(daysCount())


