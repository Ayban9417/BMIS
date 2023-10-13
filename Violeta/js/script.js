$(document).ready(function () {
	'use strict';


	// Shuffle js filter and masonry
	var containerEl = document.querySelector('.shuffle-wrapper');
	if (containerEl) {
		var Shuffle = window.Shuffle;
		var myShuffle = new Shuffle(document.querySelector('.shuffle-wrapper'), {
			itemSelector: '.shuffle-item',
			buffer: 1
		});

		jQuery('input[name="shuffle-filter"]').on('change', function (evt) {
			var input = evt.currentTarget;
			if (input.checked) {
				myShuffle.filter(input.value);
			}
		});
	}

	$('.portfolio-single-slider').slick({
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000

	});

	$('.clients-logo').slick({
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000
	});

	$('.testimonial-slider').slick({
		slidesToShow: 1,
		infinite: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000
	});


	// CountDown JS
	$('.count-down').syotimer({
		year: 2021,
		month: 5,
		day: 9,
		hour: 20,
		minute: 30
	});

	// Magnific Popup Image
	$('.portfolio-popup').magnificPopup({
		type: 'image',
		removalDelay: 160, //delay removal by X to allow out-animation
		callbacks: {
			beforeOpen: function () {
				// just a hack that adds mfp-anim class to markup
				this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
				this.st.mainClass = this.st.el.attr('data-effect');
			}
		},
		closeOnContentClick: true,
		midClick: true,
		fixedContentPos: true,
		fixedBgPos: true
	});

	//  Count Up
	function counter() {
		var oTop;
		if ($('.count').length !== 0) {
			oTop = $('.count').offset().top - window.innerHeight;
		}
		if ($(window).scrollTop() > oTop) {
			$('.count').each(function () {
				var $this = $(this),
					countTo = $this.attr('data-count');
				$({
					countNum: $this.text()
				}).animate({
					countNum: countTo
				}, {
					duration: 1000,
					easing: 'swing',
					step: function () {
						$this.text(Math.floor(this.countNum));
					},
					complete: function () {
						$this.text(this.countNum);
					}
				});
			});
		}
	}
	$(window).on('scroll', function () {
		counter();
	});




	// contactr form
	$('#contact-form').validate({
		rules: {
			user_name: {
				required: true,
				minlength: 4
			},
			user_email: {
				required: true,
				email: true
			},
			user_subject: {
				required: false
			},
			user_message: {
				required: true
			}
		},
		messages: {
			user_name: {
				required: 'Come on, you have a name don\'t you?',
				minlength: 'Your name must consist of at least 2 characters'
			},
			user_email: {
				required: 'Please put your email address'
			},
			user_message: {
				required: 'Put some messages here?',
				minlength: 'Your name must consist of at least 2 characters'
			}

		},
		submitHandler: function (form) {
			$(form).ajaxSubmit({
				type: 'POST',
				data: $(form).serialize(),
				url: 'sendmail.php',
				success: function () {
					$('#contact-form #success').fadeIn();
				},
				error: function () {

					$('#contact-form #error').fadeIn();
				}
			});
		}
	});

});

window.uni_modal = function($title = '', $url = '', $size = "") {
    $.ajax({
        url: $url,
        error: err => {
            console.log()
            alert("An error occured")
        },
        success: function(resp) {
            if (resp) {
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                $('#uni_modal .modal-dialog').removeClass('large')
                $('#uni_modal .modal-dialog').removeClass('mid-large')
                $('#uni_modal .modal-dialog').removeClass('modal-md')
                if ($size == '') {
                    $('#uni_modal .modal-dialog').addClass('modal-md')
                } else {
                    $('#uni_modal .modal-dialog').addClass($size)
                }
                $('#uni_modal').modal({
                    backdrop: 'static',
                    keyboard: true,
                    focus: true
                })
                $('#uni_modal').modal('show')
            }
        }
    })
}
window.uni_modal_secondary = function($title = '', $url = '', $size = "") {
    $.ajax({
        url: $url,
        error: err => {
            console.log()
            alert("An error occured")
        },
        success: function(resp) {
            if (resp) {
                $('#uni_modal_secondary .modal-title').html($title)
                $('#uni_modal_secondary .modal-body').html(resp)
                $('#uni_modal_secondary .modal-dialog').removeClass('large')
                $('#uni_modal_secondary .modal-dialog').removeClass('mid-large')
                $('#uni_modal_secondary .modal-dialog').removeClass('modal-md')
                if ($size == '') {
                    $('#uni_modal_secondary .modal-dialog').addClass('modal-md')
                } else {
                    $('#uni_modal_secondary .modal-dialog').addClass($size)
                }
                $('#uni_modal_secondary').modal({
                    backdrop: 'static',
                    keyboard: true,
                    focus: true
                })
                $('#uni_modal_secondary').modal('show')
            }
        }
    })
}
window._conf = function($msg = '', $func = '', $params = []) {
    $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal('show')
}
$(function() {
    $('.select2').select2({
        width: "100%",
        placeholder: "Select Here",
    })
    $('#uni_modal').on('show.bs.modal', function() {
        $('.select2').select2({
            width: "100%",
            placeholder: "Select Here",
            dropdownParent: "#uni_modal"
        })
        if ($(this).find('.summernote')) {
            $('.summernote').each(function() {
                var _height = $(this).attr('data-height') || '20vh';
                var tabsize = $(this).attr('data-tabsize') || 2;
                var placeholder = $(this).attr('data-placeholder') || "Write something here.";
                $(this).summernote({
                    placeholder: placeholder,
                    tabsize: tabsize,
                    height: _height,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                        ['view', ['fullscreen', 'codeview']]
                    ]
                })
            })
            $('.panel-heading.note-toolbar').addClass('bg-light border-bottom shadow ')
        }
    })
    $('.summernote').each(function() {
        var _height = $(this).attr('data-height') || '20vh';
        var tabsize = $(this).attr('data-tabsize') || 2;
        var placeholder = $(this).attr('data-placeholder') || "Write something here.";
        $(this).summernote({
            placeholder: placeholder,
            tabsize: tabsize,
            height: _height,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        })
    })
    $('.panel-heading.note-toolbar').addClass('bg-light border-bottom shadow ')
})

