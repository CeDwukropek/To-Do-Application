

//sticky notes
$('.navigationDot').click(function () {
    $(this).toggleClass('active')
})

const dateDiv = document.getElementById('dateCreator')
const date = new Date()
const day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate()
const month = date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1

dateDiv.placeholder = day + '.' + month + '.' + date.getFullYear()

