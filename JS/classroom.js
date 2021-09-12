window.addEventListener('DOMContentLoaded', ()=>{
    // Timer

    const classroom__controlTimer = document.querySelector('.classroom__control-timer p');
    let minute = 0;
    let second = 0;
    function startTimer(){
        let startTime =Number(classroom__controlTimer.id);
        minute = Math.floor(startTime/60);
        second = startTime - minute * 60;
        
        let lustTime = [second, minute];

        if (second < 10){
            second = `0${second}`
        }
        if (minute < 10){
            minute = `0${minute}`
        }
        classroom__controlTimer.innerHTML = `${minute}:${second}`;
        second = lustTime[0];
        minute = lustTime[1];
    }
    function stepTime(){
        
        second++;
        if (second == 60){
            second = 0;
            minute++;
        }
        let lustTime = [second, minute];

        if (second < 10){
            second = `0${second}`
        }
        if (minute < 10){
            minute = `0${minute}`
        }
        classroom__controlTimer.innerHTML = `${minute}:${second}`;
        second = lustTime[0];
        minute = lustTime[1];
    }
    startTimer();
    setInterval(stepTime, 1000);
})