$(function() {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $.ajax({
        method:'GET',
        url:'/Calendar/User/getEvents',
        success:function(data){
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                defaultDate: $.now(),
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                selectable:true,
                selectHelper:true,
                locale: 'fr',
                eventLimit: true, // allow "more" link when too many events
                select: function(start, end) {
                    $('#event-modal').modal({
                        backdrop: 'static'
                    });
                    var form = $("<form></form>");
                    form.append("<div class='row'></div>");
                    form.find(".row")
                        .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' type='text' name='title'/></div></div>")
                        .append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='select form-control' name='color'></select></div></div>")
                        .find("select[name='color']")
                        .append("<option value=''>Category</option>")
                        .append("<option value='#f62d51'>Danger</option>")
                        .append("<option value='#2c9c11'>Success</option>")
                        .append("<option value='#3775ca'>Info</option>")
                        .append("<option value='#7e8092'>Primary</option>")
                        .append("<option value='#e2c429'>Warning</option></div></div>");
                    $('#event-modal').find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {
                        form.submit();
                    });
                    $('#event-modal').find('form').on('submit', function () {
                        var id;
                        var eventData;
                        var title = form.find("input[name=title]").val();
                        var color = form.find("select[name=color]").val();
                        eventData = {
                            title: title,
                            start: $.fullCalendar.formatDate(start,'Y-MM-DD'),
                            end: $.fullCalendar.formatDate(end,'Y-MM-DD'),
                            color:color
                        };
                        if(title && color){
                            $.ajax({
                                method:'POST',
                                url:'/Calendar/User/addEvent',
                                data:eventData,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(data){
                                    eventData.id = data.id;
                                    $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                                    $('#event-modal').modal('hide');
                                },error:function(e){
                                    console.log(e)
                                }
                            });
                        }else{
                            if(!title){
                                form.find("input[name=title]").parent('.form-group').addClass('has-error');
                            }else{
                                form.find("input[name=title]").parent('.form-group').removeClass('has-error');
                            }
                            if(!color){
                                form.find("select[name=color]").parent('.form-group').addClass('has-error');
                            }else{
                                form.find("select[name=color]").parent('.form-group').removeClass('has-error');
                            }
                        }

                        return false;
                    });
                    $('#calendar').fullCalendar('unselect');
                },
                eventResize:function(){
                    alert("eventResize func");
                },
                eventDrop:function(event){
                    $.ajax({
                        url: '/Calendar/User/updateEvent',
                        type: 'PATCH',
                        data: {
                            id: event.id,
                            start: event.start.format(),
                            end: event.end.format()
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    });
                },
                eventClick:function(events){
                    if(confirm("are you sure to remove it ?")){
                        var id = events.id;
                        $.ajax({
                            url:'/Calendar/User/deleteEvent',
                            type: 'post',
                            data: {
                                id:id,
                                _method: 'delete',
                                _token : $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(data){
                                $('#calendar').fullCalendar('removeEvents',id);
                            }
                        });
                    }
                },
                events:data
            });

        },error:function(e){
            console.log("error")
        }
    });

});

