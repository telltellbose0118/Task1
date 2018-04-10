/**
 *
 */

function getBall(index){
	var object = document.getElementsByClassName('ball')[index];
	return object;
}

function animate_ball(object,ma,mi,){

	var obj = object;
	var ticks = 0;
	var velocity = 0;
	var acceleration = 0;
	var position_y = 0;
	var std_y = window.pageYOffset + obj.getClientRects().top;
	var std_x = window.pageXOffset + obj.getClientRects().left;
	var y = 0;
	var max_y = ma;
	var min_y = mi < 0? mi : -mi;

	obj.style.position = "absolute";

	animate();

	function animate(){

		timer += 1;
		acceleration = y >= 0 ? -2 : 2;
		velocity += acceleration;
		y += 0.5 * acceleration + velocity;
		obj.style.top = std_y + y + "px";

		requestAnimationFrame(animate);
	}
}

window.addEventListener("DOMContentLoaded",animate_ball(getObject(0),50,50),false);
window.addEventListener("DOMContentLoaded",animate_ball(getObject(1),50,50),false);
window.addEventListener("DOMContentLoaded",animate_ball(getObject(2),50,50),false);
window.addEventListener("DOMContentLoaded",animate_ball(getObject(3),50,50),false);
