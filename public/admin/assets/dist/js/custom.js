let activeMangment = document.querySelector('.active_mangment'),
    extras = document.querySelector('.extras'),
    colocks = document.querySelector('.colocks'),
    locationn = document.querySelector('.location'),
    activeMangmentContent = document.querySelector('.active_mangment_content'),
    extrasContent = document.querySelector('.extras_content'),
    colocksContent = document.querySelector('.colocks_content'),
    addNewTimeBtn = document.querySelector('.add_new_time_btn'),
    addNewTime = document.querySelector('.add_new_time'),
    locationContent = document.querySelector('.location_content');

activeMangment.addEventListener('click', () => {
    activeMangmentContent.style.display = 'block';
    extrasContent.style.display = 'none';
    colocksContent.style.display = 'none';
    locationContent.style.display = 'none';
});

extras.addEventListener('click', () => {
    activeMangmentContent.style.display = 'none';
    extrasContent.style.display = 'block';
    colocksContent.style.display = 'none';
    locationContent.style.display = 'none';
});

colocks.addEventListener('click', () => {
    activeMangmentContent.style.display = 'none';
    extrasContent.style.display = 'none';
    colocksContent.style.display = 'block';
    locationContent.style.display = 'none';
});

locationn.addEventListener('click', () => {
    activeMangmentContent.style.display = 'none';
    extrasContent.style.display = 'none';
    colocksContent.style.display = 'none';
    locationContent.style.display = 'block';
});

addNewTimeBtn.addEventListener('click', () => {
    addNewTime.classList.toggle('switch');
    if (addNewTime.classList.contains('switch') == false) {
        addNewTimeBtn.innerHTML = 'الغاء العملية';
    } else {
        addNewTimeBtn.innerHTML = 'اضافة فترة عمل جديدة';
    }
});



