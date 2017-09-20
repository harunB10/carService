   $(document).ready(function(){
            var options = {
                max_value: 5,
                step_size: 0.5,
                initial_value: 0.5,
                readonly: false,
                update_input_field_name: $("#input2"),
            }
            var options2 = {
                max_value: 5,
                step_size: 0.5,
                initial_value: 0.5,
                readonly: true,
                }

            $(".rate").rate(options);

            $(".rate2").rate(options2);

            $(".rate2").on("change", function(ev, data){
                console.log(data.from, data.to);
            });

            $(".rate2").on("updateError", function(ev, jxhr, msg, err){
                console.log("This is a custom error event");
            });

            $(".rate2").rate("setAdditionalData", {id: 42});
            $(".rate2").on("updateSuccess", function(ev, data){
                console.log(data);
            });

            var options3 = {
                selected_symbol_type: 'utf8_emoticons',
                max_value: 4,
                step_size: 1,
                convert_to_utf8: true,
                only_select_one_symbol: true,
            };
            $("#rate3").rate(options3);

            setTimeout(function(){
                $("#rate4").rate({
                    selected_symbol_type: 'fontawesome_beer',
                    max_value: 5,
                    step_size: 0.25,
                });

                $("#rate6").rate({
                    selected_symbol_type: 'fontawesome_star',
                    max_value: 5,
                    step_size: 0.25,
                });
            }, 2000);

            $("#rate5").rate({
                selected_symbol_type: 'image',
                max_value: 5,
                step_size: 1,
                symbols: {
                    image: {
                        base: '<div class="im">&nbsp;</div>',
                        hover: '<div class="im">&nbsp;</div>',
                        selected: '<div class="im">&nbsp;</div>',
                    },
                }
            });

            $("#rate7").rate({
                selected_symbol_type: 'image2',
                max_value: 5,
                step_size: 1,
                update_input_field_name: $("#input1"),
                only_select_one_symbol: true,
                symbols:{
                    image2: {
                        base: ['<div style="background-image: url(\'./images/emoji1.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji2.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji3.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji4.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji5.png\');" class="im2">&nbsp;</div>',],
                        hover: ['<div style="background-image: url(\'./images/emoji1.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji2.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji3.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji4.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji5.png\');" class="im2">&nbsp;</div>',],
                        selected: ['<div style="background-image: url(\'./images/emoji1.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji2.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji3.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji4.png\');" class="im2">&nbsp;</div>',
                               '<div style="background-image: url(\'./images/emoji5.png\');" class="im2">&nbsp;</div>',],
                    },
                },
            });
        });
