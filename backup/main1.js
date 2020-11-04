		const date = document.querySelector('#date');
		let items_count = 1; 
		const date_dis = document.querySelector('#date_dis');
		const count_btn = document.querySelectorAll('.count_btn');
		for (count of count_btn) {
			count.addEventListener('click',(e)=>{
				window.scrollTo(0,550);
				document.querySelector('.calc_l').style.display = 'block';
			})
		}
		date.addEventListener('change',(e)=>{
			let splite= date;
			splite=splite.value.split('-');
			splite[0]=parseInt(splite[0])+1;
			splite[1]=parseInt(splite[1]);
			splite[2]=parseInt(splite[2])-1;
			let new_date = "";
			for (let i = 0; i<splite.length;i++) {
				if (splite[i]>2000) {
					new_date+=splite[i];
				}
				else{
					if (splite[i]>=10) {

						new_date+="-"+splite[i]
					}
					else {
						
						new_date+="-0"+splite[i]
					}
				}
			}
			date_dis.value = new_date;
			new_date="";
		})
		
		const check_box = document.querySelector('.checkbox');
		const list = document.querySelector('.list');
		const mult = document.querySelector('.mult');
		const lim = document.querySelector('#lim');

		check_box.addEventListener('click',(e)=>{
				let owner = document.querySelector('.owner');
			if (lim.checked) {
				console.log('checked');
				let btn_clear = document.querySelectorAll('.clear_btn_1')
				for (btn_clear1 of btn_clear) {
					btn_clear1.style.display = 'flex';
				}
				let red = document.querySelectorAll('.red')
				for (red1 of red) {
					red1.style.display = 'none';
				}
				document.querySelector('.red7').style.display = 'flex';
				document.querySelector('.clear_all').style.display = 'flex';
				document.querySelector('.n_1').classList.add('w80');
				document.querySelector('.active_users').style.display='block';
			}
			else if (document.querySelector('.w80')) {
				let btn_clear = document.querySelectorAll('.clear_btn_1')
				for (btn_clear1 of btn_clear) {
					btn_clear1.style.display = 'none';
				}
				document.querySelector('.active_users').style.display='none';
				document.querySelector('.n_1').classList.remove('w80');

			}
			if (lim.checked) {
				owner.style.display = 'none';
			}
			else{

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
		document.querySelector('.clear_btn_1').addEventListener('click',(e)=>{
			let users = document.querySelectorAll('.input_users');
		});
		const data_list = document.querySelectorAll('.form_btn');
		for (data of data_list) {
			data.addEventListener('click',(e)=>{
				if (e.target.dataset.list) {
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
			})
		}
		const active_users = document.querySelector('.active_users');
		active_users.addEventListener('click',(e)=>{
			if (e.target.dataset.clear) {
				
				if (e.target.classList[1]=='blue') {
					let plus = parseInt(e.target.dataset.clear)+1;
					document.querySelector('.sec_calc_'+plus).classList.add('active');
					document.querySelector('.blue'+e.target.dataset.clear).style.display = 'none';
					document.querySelector('.clear_'+e.target.dataset.clear).style.justifyContent ='center';
					if (document.querySelector('.red'+e.target.dataset.clear)) {
						document.querySelector('.red'+e.target.dataset.clear).style.display = 'flex';
					}
				}
				else if (e.target.classList[1]=='red') {
					items_count--;
					let plus = parseInt(e.target.dataset.clear)-1;
					document.querySelector('.n'+e.target.dataset.clear).value = '';
					document.querySelector('.sec_calc_'+e.target.dataset.clear).classList.remove('active');
					document.querySelector('.calc_avto'+plus).style.width="80%";
					document.querySelector('.blue'+plus).style.display = 'flex';
					document.querySelector('.clear_'+plus).style.display = 'flex';


				}
			}
		})
		const clear_all = document.querySelector('.clear_all');
		clear_all.addEventListener('click', (e)=>{
			let calc_select = document.querySelectorAll('.calc_select');
			for (var i = 1; i <= 7; i++) {
				let clear = document.querySelector('.clear_'+i);
				clear.style.justifyContent ='flex-end';
			}
			let blue = document.querySelectorAll('.blue');
			for (blue_0 of blue) {
				blue_0.style.display ='flex';
			}
			for (calc1 of calc_select) {
				calc1.value='';
			}
			let sec2_calc_avto = document.querySelectorAll('.sec2_calc_avto');
			for (sec2 of sec2_calc_avto) {
				sec2.classList.remove('active');
			}
			document.querySelector('.sec_calc_1').classList.add('active');
			for (var i = 1; i <= 7; i++) {
				document.querySelector('.calc_avto'+i).style.width="80%";
				document.querySelector('.clear_'+i).style.display = 'flex';
				document.querySelector('.blue'+i).style.display = 'flex';
				document.querySelector('.red'+i).style.display = 'none';
			}
		});
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