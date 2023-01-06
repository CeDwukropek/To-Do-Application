

const container = document.querySelector(".calendar")
const date = new Date()
const actualYear = date.getFullYear()
const actualMonth = date.getMonth() + 4

const daysCount = () => {
    return new Date(actualYear, actualMonth + 1, 0).getDate()
}
const firstDayInMonth = () => {
    return new Date(actualYear, actualMonth).getDay()
}

function createDays(days) {
    let daysCounter = 0
    let daysFromPreviousMonth = firstDayInMonth() - 1;

    console.log(daysFromPreviousMonth + daysCount())

    let maxDays = daysFromPreviousMonth + daysCount() > (5 * 7) ? (6 * 7) : (5 * 7)


    if (firstDayInMonth() == 1) {
        for (let i = 0; i < days; i++) {
            let createdDiv = appendChildMultiple(i + 1)

            createdDiv.setAttribute('id', i + 1)
            daysCounter++
        }

        for (let i = daysCounter, j = 1; i < maxDays; i++, j++) {
            let createdDiv = appendChildMultiple(i + 1)
            let pInDiv = createdDiv.getElementsByTagName('p')[0]

            createdDiv.setAttribute('id', j)
            createdDiv.classList.add('previousMonth')
            pInDiv.innerHTML = j
        }
    
    } else {

        if (daysFromPreviousMonth < 0) {
            daysFromPreviousMonth = 6
            for (let i = 0; i < daysFromPreviousMonth; i++) {
                let createdDiv = appendChildMultiple(i + 1)
                let firstDayFromPreviousMonth = daysCount() - 5
                let pInDiv = createdDiv.getElementsByTagName('p')[0]

                createdDiv.setAttribute('id', firstDayFromPreviousMonth + i)
                createdDiv.classList.add('previousMonth')
                pInDiv.innerHTML = firstDayFromPreviousMonth + i
                daysCounter++
            }

            for (let i = 0; i < days; i++) {
                let createdDiv = appendChildMultiple(i + 1)

                createdDiv.setAttribute('id', i + 1)
                daysCounter++
            }

            for (let i = daysCounter, j = 1; i < maxDays; i++, j++) {
                let createdDiv = appendChildMultiple(i + 1)
                let pInDiv = createdDiv.getElementsByTagName('p')[0]
    
                createdDiv.setAttribute('id', j)
                createdDiv.classList.add('previousMonth')
                pInDiv.innerHTML = j
            }
        } else {
            for (let i = 0; i < daysFromPreviousMonth; i++) {
                let createdDiv = appendChildMultiple(i + 1)

                createdDiv.setAttribute('id', i + 1)
                createdDiv.classList.add('previousMonth')
                daysCounter++
            }

            for (let i = 0; i < days; i++) {
                let createdDiv = appendChildMultiple(i + 1)

                createdDiv.setAttribute('id', i + 1)
                daysCounter++
            }

            for (let i = daysCounter, j = 1; i < maxDays; i++, j++) {
                let createdDiv = appendChildMultiple(i + 1)
                let pInDiv = createdDiv.getElementsByTagName('p')[0]
    
                createdDiv.setAttribute('id', j)
                createdDiv.classList.add('previousMonth')
                pInDiv.innerHTML = j
            }
        }
    }
}

const appendChildMultiple = (counter) => {
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


