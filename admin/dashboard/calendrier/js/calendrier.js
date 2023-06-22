var calendar;
var Calendar = FullCalendar.Calendar;
// Définir le tableau d'événements
var events = [
    {
        title:'abcd',
        category:'technique',
        description:'descript',
        start:'',
        end:''
    }
];

$(function() {
   
    // Vérifier si la variable `scheds` existe et remplir le tableau d'événements

    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({ id: row.id, title: row.title,category:row.category,description:row.description, start: row.start_datetime, end: row.end_datetime });
        });
    }
    
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),

    calendar = new Calendar(document.getElementById('calendar'), {
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        selectable: true,
        progressiveEventRendering:true,
        eventColor: '#378006',
        contentHeight: 600,
        locale: 'fr',
        buttonText:{
            today:    'aujourd\'hui',
            month:    'mois',
            week:     'Semaine',
            day:      'Jour',
            list:     'liste'
          },
        

        //assigner le tableau events a la variable events
        events: events,

         // Gestionnaire de clic sur un événement
        eventClick: function(info) {
            var details = $('#event-details-modal');
            var id = info.event.id;

            if (!!scheds[id]) {
                details.find('#title').text(scheds[id].title);
                details.find('#description').text(scheds[id].description);
                details.find('#start').text(scheds[id].start_datetime);
                details.find('#end').text(scheds[id].end_datetime);
                details.find('#edit,#delete').attr('data-id', id);
                details.modal('show');
            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function(info) {
            // Do Something after events mounted
        },
        editable: true,
            
        
        // Gestionnaire de clic sur une date

        dateClick: function(info) {
            var date = info.date;
            var jsEvent = info.jsEvent;
            var view = info.view;
          
      // Ajuster la date en ajoutant le décalage du fuseau horaire (THANKS Stackoverflow)

      var adjustedDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000));
          
      // Convertir la date ajustée dans le format souhaité .slice(0, -8) pour enlever les secondes et le milisecondes
      var formattedDate = adjustedDate.toISOString().slice(0, -8);
          
            // ouvrir le modal
            $('#add-event-modal').modal('show');
          

            // Set the value of the start_datetime and end_datetime input fields in the modal
            $('#add-form').find('#start_datetime').val(formattedDate);
            $('#add-form').find('#end_datetime').val(formattedDate);
          
            console.log(date);
          }
         
    })
    
    //calendar render using fullcalendar method

    calendar.render();

    // Form reset listener
    $('#schedule-form').on('reset', function() {
        $(this).find('input:hidden').val('');
        $(this).find('input:visible').first().focus();
    });

 

    // Delete Button / Deleting an Event

    $('#delete').click(function() {
        var id = $(this).attr('data-id');

        if (!!scheds[id]) {
            var _conf = confirm("Are you sure to delete this scheduled event?");
            if (_conf === true) {
                // if conf redirect to  delete_event.php
                location.href = "./delete_event.php?id=" + id;
            }
        } else {
            alert("Event is undefined");
        }
    });
  
    
    
    
  
});


