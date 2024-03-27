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
