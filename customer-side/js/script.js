// navbar section

let menubar = document.querySelector('#menubar');
let navbar = document.querySelector('.navbar');

menubar.onclick = ()=>{
	menubar.classList.toggle('fa-xmark');
	navbar.classList.toggle('active');
}

window.onscroll = ()=>{

	if (window.scrollY > 0) {
		document.querySelector('.header').classList.add('active');
	}else{
		document.querySelector('.header').classList.remove('active');
	}

	menubar.classList.remove('fa-xmark');
	navbar.classList.remove('active');
}

window.onload = ()=>{

	if (window.scrollY > 0) {
		document.querySelector('.header').classList.add('active');
	}else{
		document.querySelector('.header').classList.remove('active');
	}
}

//login section

document.querySelector('#login-btn').onclick = () =>{
	document.querySelector('.login-form-container').classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () =>{
	document.querySelector('.login-form-container').classList.remove('active');
}

//registration section

document.querySelector('#reg_btn').addEventListener("click", function(event){
	event.preventDefault();  // add this line
	document.querySelector('.login-form-container').classList.remove('active'); // hide the login form
	document.querySelector('.registration-form-container').classList.toggle('active'); // show the registration form
});

document.querySelector('#login_btn').addEventListener("click", function(event){
	event.preventDefault();  // add this line
	document.querySelector('.registration-form-container').classList.remove('active'); // hide the login form
	document.querySelector('.login-form-container').classList.toggle('active'); // show the registration form
});

document.querySelector('#close-reg-btn').onclick = () =>{
	document.querySelector('.registration-form-container').classList.remove('active');
}

// home section



// featured section

let fwrapper = document.querySelector('.featured-wrapper-box');
let fActiveBox = fwrapper.querySelectorAll('.box');
let fActiveLabel = document.querySelector('.fActCircle').querySelectorAll('.fa-circle');
let fNextBtn = document.querySelector('#fNextBtn');
let FPreBtn = document.querySelector('#fPreBtn');

let fIndexNo = 0;

fNextBtn.onclick = ()=>{
	fIndexNo++;
	fChangeBox();
}

fPreBtn.onclick = ()=>{
	fIndexNo--;
	fChangeBox();
}

let fChangeBox = () =>{

	if (fIndexNo > fActiveBox.length-1) {
		fIndexNo = 0;
	} else if(fIndexNo < 0){
		fIndexNo = fActiveBox.length -1;
	}

	for(let i=0; i < fActiveBox.length; i++){
		if(i === fIndexNo){
			fActiveBox[i].classList.add('active');
			fActiveLabel[i].classList.add('fa-solid');

			if(window.screen.width > 800){
				fwrapper.style.transform = `translateX(${fIndexNo* -21}vw)`;
			}

		}
		else{
			fActiveBox[i].classList.remove('active');
			fActiveLabel[i].classList.remove('fa-solid');
		}
	}
}
