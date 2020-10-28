		const date = document.querySelector('#date');
		let valid = true;
		const items_users =`
<div class="calc_avto sec2_calc_avto sec_calc_1 row m-auto  active ">
	<div class="hr">
	</div>
	<div class="calc_avto calc_avto1 w80">
		<input type="text" class="calc_select fio" name="usurname[]" placeholder="Фамилия" required>
		<input type="text" class="calc_select fio n1" name="uname[]" placeholder="Имя" required>
		<input type="text" class="calc_select fio" name="ufathername[]" placeholder="Очество" required>
	</div>
	<div class="calc_avto calc_avto1 w80">
		<label for="" class="fio with_label">Дата рождения:<input type="date" name="data[]" class="calc_select data_birth" data-stage="1" onchange="Date_change(this)" required></label>
		<label for="" class="fio with_label">Серия и номер ВУ<input style="padding: 13px;" type="text" name="uvu[]" class="calc_select " required></label>
		<label for="" class="fio with_label">Начало стажа<select name="stage[]" class="calc_select sity data_stage1" style="padding: 5px;" disabled>
		</select></label>
	</div>
	<div class="clear_0 ">
		<div class="clear_btn_1  red red1" onclick="Red(this)">
 			<img src="img/min.svg" alt="">
		</div> 
		<div class="clear_btn_1  blue" onclick="Blue()">
  			<img src="img/plus.svg" alt="">
		</div>
	</div>
</div>`

		let items_count = 1; 
		const date_dis = document.querySelector('#date_dis');
		const count_btn = document.querySelectorAll('.count_btn');
		for (count of count_btn) {
			count.addEventListener('click',(e)=>{
				window.scrollTo(0,0);
				document.querySelector('.calc_l').style.display = 'block';
			})
		}
		date.addEventListener('change',(e)=>{
			let splite= date;
			splite=splite.value.split('-');
			console.log(splite);
			var D = new Date(parseInt(splite[0]),parseInt(splite[1]),parseInt(splite[2]));
			D.setDate(D.getDate() - 1);
			D.setFullYear(D.getFullYear() + 1);
			console.log(D);
			let new_date = D.getFullYear()+"-"+D.getMonth()+"-"+D.getDate();
			date_dis.value = new_date;
			new_date="";
		})
		
		const check_box = document.querySelector('.checkbox');
		const list = document.querySelector('.list');
		const mult = document.querySelector('.mult');
		const lim = document.querySelector('#lim');

		check_box.addEventListener('click',(e)=>{
			let owner = document.querySelector('.owner');
			let active_users = document.querySelector('.active_users');
			if (lim.checked) {
				owner.style.display = 'none';
				active_users.style.display = 'block';
				active_users.innerHTML = items_users;
			}
			else{
				active_users.innerHTML = '';
				active_users.style.display = 'none';
				owner.style.display = 'flex';
			}
			e.target.classList.toggle("is_active");
			if (lim.checked !== true) {
				list.style.color = '#B7B7B7'
				mult.style.color = '#4078CD'
			}
			if (lim.checked == true) {
				mult.style.color = '#B7B7B7'
				list.style.color = '#4078CD'

			}
		})
		const navigation = document.querySelector('.navigation');
		navigation.addEventListener('click',(e)=>{
			if (e.target.dataset.menu) {
				if (document.querySelector('.is_used')) {
					let a = document.querySelectorAll('.is_used');
					for (a1 of a) {
						a1.classList.remove('is_used');
					}

				}
					e.target.classList.add('is_used');
				let used = document.querySelector('.sec_'+e.target.dataset.menu);
				used.classList.add("is_used");
			}
		})
		document.querySelector('.sec2_calc_avto').addEventListener(('click'),(e)=>{
			if(e.target.tagName=="INPUT"){
				console.log('A')
			e.target.onblur = function() {
				e.target.classList.remove('input_active');
			};

			e.target.onfocus = function() {
				e.target.classList.add('input_active');
			};
		}
		});
		const st = document.querySelectorAll('.start_date');
		
		const data_list = document.querySelectorAll('.form_btn');
		for (data of data_list) {
			data.addEventListener('click',(e)=>{
				for (sts of st) {
					valid = valid&&sts.checkValidity();
					console.log(valid);
					if (valid) {
							sts.classList.remove('none')

					}
						else{
							sts.classList.add('none')
						}
				}
				if (e.target.dataset.list&&valid) {
					let a = document.querySelectorAll('.is_used');
					for (a1 of a) {
						a1.classList.remove('is_used');
					}
					if (e.target.classList[1]=='back_btn') {
						let plus = parseInt(e.target.dataset.list)-1;
						document.querySelector('.i'+plus).classList.add('is_used');
						document.querySelector('.sec_'+plus).classList.add('is_used');
						document.querySelector('.sec_'+e.target.dataset.list).classList.remove("is_used");

					}
					else{
						let plus = parseInt(e.target.dataset.list)+1;
						document.querySelector('.i'+plus).classList.add('is_used');
						document.querySelector('.sec_'+plus).classList.add("is_used");
						document.querySelector('.sec_'+e.target.dataset.list).classList.remove("is_used");
					}
				}
				valid=true;
			})
		}
		function number(){
			let number = document.querySelector('.count_input1');
			let rus = document.querySelector('.rus_inp');
			const number_rus = number.value.toString()+rus.value.toString();
			document.querySelector('.num').value= number_rus;
		}
		function Menu(){
			let menu = document.querySelectorAll('.menu')
			for (menus of menu) {
				menus.classList.toggle('dn');
			}
		}
		function Blue(){
			let active_users = document.querySelector('.active_users');
		    var newInput = document.createElement('div');
		    active_users.appendChild(newInput);
		    newInput.outerHTML = items_users;
			let blue = document.querySelectorAll('.blue');
			let red = document.querySelectorAll('.red');
			for (reds of red) {
				reds.style.display = 'flex';
			}


			for (blues of blue) {
				blues.style.display = 'none';
			}


			blue[blue.length-1].style.display = 'flex';
			if (blue.length==7) {
				blue[blue.length-1].style.display = 'none';
				red[red.length-1].style.display = 'flex';
			}
			if (blue.length>1) {
				document.querySelector('.clear_0').innerHTML = `
					<div class="clear_btn_1  red red1" style="display:flex;" onclick="Red(this)">
			 			<img src="img/min.svg" alt="">
					</div> 
                    <div class="clear_btn_1 red clear_all" style="display:flex;" data-clear="1" onclick="Clear()">
                      <img src="img/clear.svg" alt="">
                    </div>`;
			}
		}
		function Red(item){
			item.parentNode.parentNode.parentNode.removeChild(item.parentNode.parentNode)
			let red = document.querySelectorAll('.red');
			let blue = document.querySelectorAll('.blue');
			if (blue.length>=1) {
				document.querySelector('.clear_0').innerHTML = `
					<div class="clear_btn_1 red red1" style="display:flex;" onclick="Red(this)">
			 			<img src="img/min.svg" alt="">
					</div> 
                    <div class="clear_btn_1 red clear_all" style="display:flex;" data-clear="1" onclick="Clear()">
                      <img src="img/clear.svg" alt="">
                    </div>`;
				blue[blue.length-1].style.display = 'flex';
			}
			if(document.querySelectorAll('.red1').length==1){
				console.log('F');
				document.querySelector('.clear_0').innerHTML = `
				<div class="clear_btn_1  blue" onclick="Blue()">
		  			<img src="img/plus.svg" alt="">
				</div>`;
			}

		}
		function Clear(){
			let active_users = document.querySelector('.active_users');
			active_users.innerHTML = items_users;
		}
		function Date_change(item){
		            const date1 = new Date();
		            let date = item.value.split('-');
		            let dataset = item.dataset.stage;
		            const data_stage = item.parentNode.parentNode.lastElementChild.lastElementChild;
		            data_stage.innerHTML = '';
		            console.log(date[0])
		            if (date[0]>1900) {
		            	data_stage.removeAttribute('disabled');
		              console.log(date[0]);
		              for (let i = parseInt(date[0])+16;i<=date1.getFullYear();i++) {
		                data_stage.innerHTML +=`<option value="${i}">${i}</option>`
		              }
		            }else{
		            	data_stage.setAttribute('disabled','disabled');
		            }
		}