$(document).ready(function() {
	$('.main-link').fancybox();

	$('#form').formValidation({
			framework: 'bootstrap',
			addOns: {
				reCaptcha2: {
					element: 'captchaContainer',
					language: 'ru',
					theme: 'light',
					siteKey: '6Lc0aRoTAAAAAC1XEp7P_417C7KxdKWmWZlm_Uae',
					timeout: 120,
					message: 'Защита от роботов'
				}
			},
			fields: {
				contact_name: {
					validators: {
						notEmpty: {
							message: 'Введите имя'
						},
						stringLength: {
							message: 'Имя минимум 3 символа',
							min: 3
						}
					}
				},
				contact_telephone: {
					validators: {
						notEmpty: {
							message: 'Введите номер телефона'
						},
						stringLength: {
							message: 'Телефон минимум 10 символов',
							min: 16
						}
					}
				},
				/*
				contact_email: {
					validators: {
						notEmpty: {
							message: 'Введите электронный адрес'
						},
						emailAddress: {
							message: 'Введите электронный адрес'
						}
					}
				},
				contact_message: {
					validators: {
						notEmpty: {
							message: 'Сообщение минимум 10 символов'
						},
						stringLength: {
							message: 'Сообщение минимум 10 символов',
							min: 10
						}
					}
				}
				*/
			}
		})
		.on('success.form.fv', function(e) {
			e.preventDefault();

			var $form = $(e.target),
				fv = $form.data('formValidation');
			$.ajax({
				url: $form.attr('action'),
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					if (result == 1) {
						$('#form').data('formValidation').resetForm(1);
						FormValidation.AddOn.reCaptcha2.reset('captchaContainer');
					}
				}
			});
		})
		.find('[name="contact_telephone"]').mask('+7(000)000-00-00', { placeholder: "" });

	$('#form_modal').formValidation({
			framework: 'bootstrap',
			fields: {
				contact_name: {
					validators: {
						notEmpty: {
							message: 'Введите имя'
						},
						stringLength: {
							message: 'Имя минимум 3 символа',
							min: 3
						}
					}
				},
				contact_telephone: {
					validators: {
						notEmpty: {
							message: 'Введите номер телефона'
						},
						stringLength: {
							message: 'Телефон минимум 10 символов',
							min: 16
						}
					}
				}
			}
		})
		.on('success.form.fv', function(e) {
			e.preventDefault();

			var $form = $(e.target),
				fv = $form.data('formValidation');

			$.ajax({
				url: $form.attr('action'),
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					if (result == 1) {
						$('#form_modal').data('formValidation').resetForm(1);
						$('#modal_telephone').modal('hide');
					}
				}
			});
		})
		.find('[name="contact_telephone"]').mask('+7(000)000-00-00', { placeholder: "" });

	$('a[data-target="#modal_item"]').click(function(){
		var parrent_button;
		var price;
		var name;

		parrent_button = $(this).parents();
		price = $(parrent_button[2]).data('price');
		name = $(parrent_button[2]).data('name');

		$('#modal_item #item-name').html('Заказать "' + name + '"');
		$('#modal_item #item-price').html(price + ' Р');
		$('#form_item input[name="subject"]').val('Заказ "' + name + '"');
	});
	
	$('#form_item').formValidation({
			framework: 'bootstrap',
			fields: {
				contact_name: {
					validators: {
						notEmpty: {
							message: 'Введите имя'
						},
						stringLength: {
							message: 'Имя минимум 3 символа',
							min: 3
						}
					}
				},
				contact_telephone: {
					validators: {
						notEmpty: {
							message: 'Введите номер телефона'
						},
						stringLength: {
							message: 'Телефон минимум 10 символов',
							min: 16
						}
					}
				}
			}
		})
		.on('success.form.fv', function(e) {
			e.preventDefault();

			var $form = $(e.target),
				fv = $form.data('formValidation');

			$.ajax({
				url: $form.attr('action'),
				type: 'POST',
				data: $form.serialize(),
				success: function(result) {
					if (result == 1) {
						$('#form_item').data('formValidation').resetForm(1);
						$('#modal_item').modal('hide');
					}
				}
			});
		})
		.find('[name="contact_telephone"]').mask('+7(000)000-00-00', { placeholder: "" });
});
