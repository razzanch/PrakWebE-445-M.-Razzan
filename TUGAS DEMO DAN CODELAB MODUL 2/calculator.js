const display = document.querySelector('#display');
const buttons = document.querySelectorAll('button');

buttons.forEach((item) => {
    item.onclick = () => {
        if (item.id == 'clear') {
            display.innerText = '';
        } else if (item.id == 'backspace') {
            let string = display.innerText.toString();
            display.innerText = string.substr(0, string.length - 1);
        } else if (item.id == 'square') {
            display.innerText += '²';
        } else if (display.innerText != '' && item.id == 'equal') {
            
            let expression = display.innerText;

            expression = expression.replace(/(\d+)\²/g, 'Math.pow($1, 2)');

            try {

                display.innerText = eval(expression);
            } catch (error) {

                display.innerText = 'Error!';
                setTimeout(() => (display.innerText = ''), 2000); 
            }
        } else if (display.innerText == '' && item.id == 'equal') {
            display.innerText = 'Empty!';
            setTimeout(() => (display.innerText = ''), 2000);
        } else {
            display.innerText += item.id;
        }
    }
});




const themeToggleBtn = document.querySelector(".theme-toggler");
const calculator = document.querySelector(".calculator");

let isDark = true;
themeToggleBtn.onclick = () => {
  calculator.classList.toggle("dark");
  themeToggleBtn.classList.toggle("active");
  isDark = !isDark;
};