
//global variables
const container = document.querySelector(".calendar") //container for days
const actualYear = new Date().getFullYear()
const actualMonth = new Date().getMonth()

//counts days in this month
const daysCount = (month = actualMonth) => {
    return new Date(actualYear, month + 1, 0).getDate()
}
//finds index of first day in this month
const firstDayInMonth = () => {
    return new Date(actualYear, actualMonth).getDay()
}

const today = () => {
    return new Date().getDate()
}

//appends days on website
const appendDays = (counter) => {
    const div = document.createElement("div")
    const div2 = document.createElement("div")
    const p = document.createElement("p")

    div.classList.add('day')
    
    container.appendChild(div);
    div.appendChild(div2)

    div2.classList.add('flexBlock')
    div2.classList.add('content')

    div2.appendChild(p)
    p.innerHTML = counter

    return div
}

//creates days from previous month
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
//creates regular days from this month
const createNormalDays = (daysCounter, days) => {
    for (let i = 0; i < days; i++) {
        let createdDiv = appendDays(i + 1)

        createdDiv.setAttribute('id', i + 1)
        daysCounter++
    }

    return daysCounter
}
//fills month with days from next month
function createNextDays(daysCounter, maxDays) {
    for (let i = daysCounter, j = 1; i < maxDays; i++, j++) {
        let createdDiv = appendDays(i + 1)
        let pInDiv = createdDiv.getElementsByTagName('p')[0]

        createdDiv.setAttribute('id', j)
        createdDiv.classList.add('nextMonth')
        pInDiv.innerHTML = j
    }
}

//system of creating days
function createDays(days) {
    let daysCounter = 0
    let daysFromPreviousMonth = firstDayInMonth() - 1;
    
    //sets number 6 if first day in month was Sunday
    daysFromPreviousMonth = daysFromPreviousMonth < 0 ? daysFromPreviousMonth = 6 : daysFromPreviousMonth
    
    //sets maximum number of days in calendar month
    let maxDays = (daysFromPreviousMonth + days) > (5 * 7) ? (6 * 7) : (5 * 7)

    daysCounter += createPreviousDays(daysCounter, daysFromPreviousMonth)
    daysCounter = createNormalDays(daysCounter, days)
    createNextDays(daysCounter, maxDays)

    console.log(today())
    document.getElementById(today()).classList.add("today")
}

//run function to create days in calendar
createDays(daysCount())

