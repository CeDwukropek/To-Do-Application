//custom shadow BG for cards


const containers = document.querySelectorAll('.day')

//setting values before users move
for(const el of containers) {
    const rect = el.getBoundingClientRect(),
          x = 0 - rect.left,
          y = 0 - rect.top;
    
    el.style.setProperty("--mouse-x", `${x}px`)
    el.style.setProperty("--mouse-y", `${y}px`)
}

//setting values when user moves mouse
document.onmousemove = e => {
    for(const el of containers) {
        const rect = el.getBoundingClientRect()
        const x = e.clientX - rect.left
        const y = e.clientY - rect.top
        
        el.style.setProperty("--mouse-x", `${x}px`)
        el.style.setProperty("--mouse-y", `${y}px`)
    }
}

