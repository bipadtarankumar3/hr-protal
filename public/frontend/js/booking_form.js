document.addEventListener('DOMContentLoaded', function() {
// Date picker elements
const bookFormDateInput = document.getElementById('book_form_date');
const bookFormDatePicker = document.getElementById('book_form_date_picker');
const bookFormCalendarIcon = document.querySelector('.book_form_calendar_icon');
const bookFormPrevMonthBtn = document.getElementById('book_form_prev_month');
const bookFormNextMonthBtn = document.getElementById('book_form_next_month');
const bookFormCurrentMonthYear = document.getElementById('book_form_current_month_year');
const bookFormDateGrid = document.getElementById('book_form_date_grid');
const bookFormForm = document.getElementById('book_form_form');
const bookFormResult = document.getElementById('book_form_result');
const bookFormResultText = document.getElementById('book_form_result_text');

// Current date
let bookFormCurrentDate = new Date();
let bookFormSelectedDate = null;

// Days of the week
const bookFormDaysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

// Initialize the date picker
function bookFormInitDatePicker() {
    // Add day headers
    bookFormDaysOfWeek.forEach(day => {
        const dayElement = document.createElement('div');
        dayElement.className = 'book_form_date_picker_day';
        dayElement.textContent = day;
        bookFormDateGrid.appendChild(dayElement);
    });
    
    // Render the current month
    bookFormRenderCalendar(bookFormCurrentDate);
    
    // Event listeners
    bookFormDateInput.addEventListener('click', bookFormToggleDatePicker);
    bookFormCalendarIcon.addEventListener('click', bookFormToggleDatePicker);
    bookFormPrevMonthBtn.addEventListener('click', bookFormShowPreviousMonth);
    bookFormNextMonthBtn.addEventListener('click', bookFormShowNextMonth);
    
    // Close date picker when clicking outside
    document.addEventListener('click', function(event) {
        if (!bookFormDateInput.contains(event.target) && !bookFormDatePicker.contains(event.target)) {
            bookFormDatePicker.classList.remove('book_form_date_picker_active');
        }
    });
}

// Toggle date picker visibility
function bookFormToggleDatePicker() {
    bookFormDatePicker.classList.toggle('book_form_date_picker_active');
}

// Show previous month
function bookFormShowPreviousMonth() {
    bookFormCurrentDate.setMonth(bookFormCurrentDate.getMonth() - 1);
    bookFormRenderCalendar(bookFormCurrentDate);
}

// Show next month
function bookFormShowNextMonth() {
    bookFormCurrentDate.setMonth(bookFormCurrentDate.getMonth() + 1);
    bookFormRenderCalendar(bookFormCurrentDate);
}

// Render calendar for the given date
function bookFormRenderCalendar(date) {
    // Update month and year header
    const bookFormMonthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    bookFormCurrentMonthYear.textContent = `${bookFormMonthNames[date.getMonth()]} ${date.getFullYear()}`;
    
    // Clear previous dates
    const bookFormDateElements = document.querySelectorAll('.book_form_date_picker_date');
    bookFormDateElements.forEach(element => element.remove());
    
    // Get first day of month and number of days
    const bookFormFirstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    const bookFormLastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const bookFormDaysInMonth = bookFormLastDay.getDate();
    
    // Get day of week for first day (0 = Sunday, 6 = Saturday)
    const bookFormFirstDayOfWeek = bookFormFirstDay.getDay();
    
    // Add empty cells for days before the first day of the month
    for (let i = 0; i < bookFormFirstDayOfWeek; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.className = 'book_form_date_picker_date book_form_date_picker_date_other_month';
        emptyCell.textContent = '';
        bookFormDateGrid.appendChild(emptyCell);
    }
    
    // Add cells for each day of the month
    const bookFormToday = new Date();
    bookFormToday.setHours(0, 0, 0, 0);
    
    for (let day = 1; day <= bookFormDaysInMonth; day++) {
        const dateCell = document.createElement('div');
        dateCell.className = 'book_form_date_picker_date';
        dateCell.textContent = day;
        
        const bookFormCellDate = new Date(date.getFullYear(), date.getMonth(), day);
        bookFormCellDate.setHours(0, 0, 0, 0);
        
        // Check if this is today
        if (bookFormCellDate.getTime() === bookFormToday.getTime()) {
            dateCell.classList.add('book_form_date_picker_date_today');
        }
        
        // Check if this is the selected date
        if (bookFormSelectedDate && bookFormCellDate.getTime() === bookFormSelectedDate.getTime()) {
            dateCell.classList.add('book_form_date_picker_date_selected');
        }
        
        // Add click event
        dateCell.addEventListener('click', function() {
            bookFormSelectDate(bookFormCellDate);
        });
        
        bookFormDateGrid.appendChild(dateCell);
    }
}

// Select a date
function bookFormSelectDate(date) {
    bookFormSelectedDate = date;
    
    // Format the date for display
    const bookFormOptions = { year: 'numeric', month: 'long', day: 'numeric' };
    bookFormDateInput.value = date.toLocaleDateString('en-US', bookFormOptions);
    
    // Close the date picker
    bookFormDatePicker.classList.remove('book_form_date_picker_active');
    
    // Re-render calendar to update selected state
    bookFormRenderCalendar(bookFormCurrentDate);
}

// Form submission
bookFormForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    // Get form values
    const bookFormName = document.getElementById('book_form_name').value;
    const bookFormEmail = document.getElementById('book_form_email').value;
    const bookFormPurpose = document.getElementById('book_form_purpose').value;
    const bookFormNotes = document.getElementById('book_form_notes').value;
    
    // Format the selected date
    let bookFormFormattedDate = 'No date selected';
    if (bookFormSelectedDate) {
        bookFormFormattedDate = bookFormSelectedDate.toLocaleDateString('en-US', { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        });
    }
    
    // Display result
    bookFormResultText.textContent = `
        Thank you, ${bookFormName}! 
        We have received your booking request for a ${bookFormPurpose} on ${bookFormFormattedDate}. 
        A confirmation email has been sent to ${bookFormEmail}.
        ${bookFormNotes ? `Notes: ${bookFormNotes}` : ''}
    `;
    
    bookFormResult.classList.add('book_form_result_active');
    
    // Scroll to result
    bookFormResult.scrollIntoView({ behavior: 'smooth' });
    
    // Reset form after 5 seconds
    setTimeout(() => {
        bookFormForm.reset();
        bookFormResult.classList.remove('book_form_result_active');
        bookFormSelectedDate = null;
        bookFormRenderCalendar(bookFormCurrentDate);
    }, 5000);
});

// Initialize the date picker
bookFormInitDatePicker();
});

//===================== step form ============================//

    /* --- Core step handling --- */
const steps = [...document.querySelectorAll('.book_step_step')];

function showStep(i){
  // clamp
  const idx = Math.max(0, Math.min(i, steps.length - 1));
  steps.forEach((s, ix) => s.classList.toggle('active', ix === idx));

  // focus sensible element for each step
  if(idx === 0){
    const p = document.getElementById('pickup');
    if(p){ p.focus(); p.select && p.select(); }
  } else if(idx === 1){
    // open the primary "when" dropdown list for quicker selection (optional)
    // we will not automatically open the list, but focus the whenSelected element
    const whenSel = document.getElementById('whenSelected');
    whenSel && whenSel.focus();
    // if "Schedule for later" is already chosen, show later box
    const whenText = whenSel && whenSel.textContent.trim();
    if(whenText === 'Schedule for later'){
      laterBox.style.display = 'block';
      document.getElementById('laterSelected').focus();
    }
  } else if(idx === 2){
    const whoSel = document.getElementById('whoSelected');
    whoSel && whoSel.focus();
  }

  closeAllDropdowns();
}

/* attach clicks on the summary fields which include data-open-step */
document.querySelectorAll('[data-open-step]').forEach(el=>{
  el.addEventListener('click', (ev)=>{
    const stepIndex = Number(el.dataset.openStep);
    showStep(stepIndex);

    // update small labels for context (optional)
    if(stepIndex === 0){
      // if the clicked element was pickup summary, focus pickup if already on step 0
      // (we already focus inside showStep)
    }
  });
});

/* Buttons that navigate steps */
document.getElementById('toTime').onclick = ()=> showStep(1);
document.getElementById('backToLoc').onclick = ()=> showStep(0);
document.getElementById('toFor').onclick = ()=> showStep(2);
document.getElementById('backToTime').onclick = ()=> showStep(1);

/* -------------------------
   DROPDOWNS: generic helpers
--------------------------*/
function closeAllDropdowns(){
  document.querySelectorAll('.book_step_dropdown_list').forEach(list=>{
    list.style.display = 'none';
  });
}

function toggleList(list){
  const is = list.style.display === 'block';
  closeAllDropdowns();
  list.style.display = is ? 'none' : 'block';
}

/* -------------------------
   PICK-UP: MAIN DROPDOWN (when)
--------------------------*/
const whenSel = document.getElementById('whenSelected');
const whenList = document.getElementById('whenList');
const laterBox = document.getElementById('laterBox');

whenSel.addEventListener('click', (e)=>{
  e.stopPropagation();
  toggleList(whenList);
});

whenList.querySelectorAll("li").forEach(li=>{
  li.addEventListener('click', (e)=>{
    e.stopPropagation();
    whenSel.textContent = li.dataset.value;
    whenList.style.display = "none";

    // show/hide laterBox depending on selection
    if(li.dataset.value === "Schedule for later"){
      laterBox.style.display = "block";
      // open later dropdown automatically so user can pick specific timeframe
      document.getElementById('laterSelected').focus();
    } else {
      laterBox.style.display = "none";
      // ensure laterSelected resets to default if hiding (optional)
      // document.getElementById('laterSelected').textContent = 'Select';
    }

    // update summary label in top
    document.getElementById('timeLabel').textContent = li.dataset.value;
  });
});

/* -------------------------
   SECOND DROPDOWN (Today, Tomorrow...)
--------------------------*/
const laterSel = document.getElementById("laterSelected");
const laterList = document.getElementById("laterList");

laterSel.addEventListener('click', (e)=>{
  e.stopPropagation();
  toggleList(laterList);
});

laterList.querySelectorAll("li").forEach(li=>{
  li.addEventListener('click',(e)=>{
    e.stopPropagation();
    laterSel.textContent = li.dataset.value;
    laterList.style.display = "none";
    // update summary label
    document.getElementById('timeLabel').textContent = li.dataset.value;
  });
});

/* -------------------------
   WHO IS THIS FOR
--------------------------*/
const whoSel = document.getElementById("whoSelected");
const whoList = document.getElementById("whoList");
const extraContact = document.getElementById("extraContact");

whoSel.addEventListener('click', (e)=>{
  e.stopPropagation();
  toggleList(whoList);
});

whoList.querySelectorAll("li").forEach(li=>{
  li.addEventListener('click', (e)=>{
    e.stopPropagation();
    whoSel.textContent = li.dataset.value;
    whoList.style.display="none";

    extraContact.style.display = li.dataset.value === "Someone else" ? "block" : "none";
    // update summary label in top
    document.getElementById('forLabel').textContent = li.dataset.value;
  });
});

/* -------------------------
   Close dropdowns when clicking outside
--------------------------*/
document.addEventListener('click', (e)=>{
  closeAllDropdowns();
});

/* also close dropdowns on escape */
document.addEventListener('keydown', (e)=>{
  if(e.key === 'Escape') closeAllDropdowns();
});

/* -------------------------
   Reflection into summary labels as user types
--------------------------*/
const pickupInput = document.getElementById('pickup');
const dropInput = document.getElementById('dropoff');
const pickupLabel = document.getElementById('pickupLabel');
const dropLabel = document.getElementById('dropLabel');

pickupInput.addEventListener('input', (e)=>{
  const v = e.target.value.trim();
  pickupLabel.textContent = v || 'Pick-up location';
  checkEnableSearchBtn();
});
dropInput.addEventListener('input', (e)=>{
  const v = e.target.value.trim();
  dropLabel.textContent = v || 'Drop-off location';
  checkEnableSearchBtn();
});

/* Clear step0 inputs */
document.getElementById('clear0').addEventListener('click', ()=>{
  pickupInput.value = '';
  dropInput.value = '';
  pickupLabel.textContent = 'Pick-up location';
  dropLabel.textContent = 'Drop-off location';
  checkEnableSearchBtn();
  pickupInput.focus();
});

/* -------------------------
   Form submit + bottom Search enable logic
--------------------------*/
const bottomSearchBtn = document.getElementById('bottomSearch');

function checkEnableSearchBtn(){
  const ok = pickupInput.value.trim() && dropInput.value.trim();
  bottomSearchBtn.classList.toggle('enabled', !!ok);
  if(ok){
    bottomSearchBtn.disabled = false;
    bottomSearchBtn.style.cursor = 'pointer';
  } else {
    bottomSearchBtn.disabled = true;
    bottomSearchBtn.style.cursor = 'not-allowed';
  }
}
checkEnableSearchBtn();

document.getElementById('book_step_form').addEventListener('submit', (e)=>{
  e.preventDefault();
  // compile form summary (simple)
  const payload = {
    pickup: pickupInput.value.trim(),
    dropoff: dropInput.value.trim(),
    when: whenSel.textContent.trim(),
    later: laterSel.textContent.trim(),
    who: whoSel.textContent.trim(),
    email: document.getElementById('email').value.trim(),
    phone: document.getElementById('phone').value.trim()
  };
  alert('Search triggered!\n' + JSON.stringify(payload, null, 2));
});

/* bottom Search triggers form submit if enabled */
bottomSearchBtn.addEventListener('click', ()=>{
  if(bottomSearchBtn.classList.contains('enabled')){
    document.getElementById('book_step_form').requestSubmit();
  } else {
    // if not enabled, jump to step 0 to enter locations
    showStep(0);
  }
});

/* initialize and close any open lists */
closeAllDropdowns();

/* make sure clicking summary fields doesn't accidentally trigger dropdown lists open behind */
document.querySelectorAll('[data-open-step]').forEach(el=>{
  el.addEventListener('mousedown', (ev)=> ev.preventDefault()); // keep focus behavior consistent
});