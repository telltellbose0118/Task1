/**
 *
 */
function animate_ball(object){

	var stored_object = object;
	var timer = 0;
	var velocity = 0;
	var acceleration = 0;
	var position_y = std_y = stored_object.style.top;

	animate(2);

	function animate(a){

		setTimeout(() => {

			timer += 1;
			acceleration = position_y >= std_y ? -a : a;
			velocity += acceleration;
			position_y += 0.5 * acceleration + velocity;
			stored_object.style.top = position_y;
			setTimeout(animate(a), 1);

		}, 1);
	}
}