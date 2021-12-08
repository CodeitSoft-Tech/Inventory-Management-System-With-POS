//Full Calendar
document.addEventListener('DOMContentLoaded', function() {
	var containerEl = document.getElementById('external-events-list');
	new FullCalendar.Draggable(containerEl, {
	  itemSelector: '.fc-event',
	  eventData: function(eventEl) {
		return {
		  title: eventEl.innerText.trim()
		}
	  }
	});
	var calendarEl = document.getElementById('calendar');

	var calendar = new FullCalendar.Calendar(calendarEl, {
	  headerToolbar: {
		left: 'prev,next today',
		center: 'title',
		right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
	  },
	  navLinks: true, // can click day/week names to navigate views
	  businessHours: true, // display business hours
	  editable: true,
	  selectable: true,
	  selectMirror: true,
	  droppable: true, // this allows things to be dropped onto the calendar
	  drop: function(arg) {
		// is the "remove after drop" checkbox checked?
		if (document.getElementById('drop-remove').checked) {
		  // if so, remove the element from the "Draggable Events" list
		  arg.draggedEl.parentNode.removeChild(arg.draggedEl);
		}
	  },
	  select: function(arg) {
		var title = prompt('Event Title:');
		if (title) {
		  calendar.addEvent({
			title: title,
			start: arg.start,
			end: arg.end,
			allDay: arg.allDay
		  })
		}
		calendar.unselect()
	  },
	  eventClick: function(arg) {
		if (confirm('Are you sure you want to delete this event?')) {
		  arg.event.remove()
		}
	  },
	  editable: true,
	  dayMaxEvents: true, // allow "more" link when too many events
	  events: [
		{
		  title: 'Business Lunch',
		  start: '2020-11-03T13:00:00',
		  constraint: 'businessHours'
		},
		{
		  title: 'Meeting',
		  start: '2020-11-13T11:00:00',
		  constraint: 'availableForMeeting', // defined below
		  color: '#257e4a'
		},
		{
		  title: 'Conference',
		  start: '2020-11-18',
		  end: '2020-10-20'
		},
		{
		  title: 'Party',
		  start: '2020-11-29T20:00:00'
		},

		// areas where "Meeting" must be dropped
		{
		  groupId: 'availableForMeeting',
		  start: '2020-11-11T10:00:00',
		  end: '2020-11-11T16:00:00',
		  display: 'background'
		},
		{
		  groupId: 'availableForMeeting',
		  start: '2020-11-13T10:00:00',
		  end: '2020-11-13T16:00:00',
		  display: 'background'
		},

		// red areas where no events can be dropped
		{
		  start: '2020-11-24',
		  end: '2020-11-28',
		  overlap: false,
		  display: 'background',
		  color: '#f6f6f9'
		},
		{
		  start: '2020-11-06',
		  end: '2020-11-08',
		  overlap: false,
		  display: 'background',
		  color: '#f6f6f9'
		}
	  ]
	});

	calendar.render();
});	
  
  
