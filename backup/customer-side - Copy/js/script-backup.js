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

// home section

document.querySelector('.home').onmousemove = (e) =>{
	document.querySelectorAll('.home-parallax').forEach(element =>{
		let speed = element.getAttribute('data-speed');

		let x= (window.innerWidth - e.pageX * speed) / 90;
		let y = (window.innerHeight - e.pageY * speed) / 90;

		element.style.transform = `translateX(${y}px) translateY(${x}px)`;
	})
}

document.querySelector('.home').onmouseleave = (e) =>{
	document.querySelectorAll('.home-parallax').forEach(element =>{

		element.style.transform = `translateX(0px) translateY(0px)`;
	})
}

// parts section

let wrapper = document.querySelector('.wrapper-box');
let activeBox = wrapper.querySelectorAll('.box');
let activeLabel = document.querySelector('.activeCircle').querySelectorAll('.fa-circle');
let nextBtn = document.querySelector('#nextBtn');
let preBtn = document.querySelector('#preBtn');

let indexNo = 0;

nextBtn.onclick = ()=>{
	indexNo++;
	changeBox();
}

preBtn.onclick = ()=>{
	indexNo--;
	changeBox();
}

let changeBox = () =>{

	if (indexNo > activeBox.length-1) {
		indexNo = 0;
	} else if(indexNo < 0){
		indexNo = activeBox.length -1;
	}

	for(let i=0; i < activeBox.length; i++){
		if(i === indexNo){
			activeBox[i].classList.add('active');
			activeLabel[i].classList.add('fa-solid');

			if(window.screen.width > 768){
			wrapper.style.transform = `translateX(${indexNo* -250}px)`;
			}
		}
		else{
			activeBox[i].classList.remove('active');
			activeLabel[i].classList.remove('fa-solid');
		}
	}
}

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

// reviews section

let rwrapper = document.querySelector('.review-wrapper-box');
let rActiveBox = rwrapper.querySelectorAll('.box');
let rActiveLabel = document.querySelector('.rActCircle').querySelectorAll('.fa-circle');
let rNextBtn = document.querySelector('#rNextBtn');
let rPreBtn = document.querySelector('#rPreBtn');

let rIndexNo = 0;

rNextBtn.onclick = ()=>{
	rIndexNo++;
	rChangeBox();
}

rPreBtn.onclick = ()=>{
	rIndexNo--;
	rChangeBox();
}

let rChangeBox = () =>{

	if (rIndexNo > rActiveBox.length-1) {
		rIndexNo = 0;
	} else if(rIndexNo < 0){
		rIndexNo = rActiveBox.length -1;
	}

	for(let i=0; i < rActiveBox.length; i++){
		if(i === rIndexNo){
			rActiveBox[i].classList.add('active');
			rActiveLabel[i].classList.add('fa-solid');

			if(window.screen.width > 800){
				rwrapper.style.transform = `translateX(${rIndexNo* -20}vw)`;
			}
		}
		else{
			rActiveBox[i].classList.remove('active');
			rActiveLabel[i].classList.remove('fa-solid');
		}
	}
}