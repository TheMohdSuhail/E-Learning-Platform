const sublist = document.querySelector('.sublist');
let currentIndex = 0;

function showSubject(index) {
  const translateValue = -index * 110 + 'px'; /* Set the width of each list item plus margin */
  sublist.style.transform = 'translateX(' + translateValue + ')';
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % (document.querySelectorAll('.sublist li').length - 3);
  showSubject(currentIndex);
}

function prevSlide() {
  currentIndex = (currentIndex - 1 + document.querySelectorAll('.sublist li').length - 3) % (document.querySelectorAll('.sublist li').length - 3);
  showSubject(currentIndex);
}

// Sidebar JS


document.getElementById("toggle").addEventListener("click", function() {
    document.querySelector(".sidebar").style.width = "250px";
});

// Close the sidebar
document.querySelector(".closebtn").addEventListener("click", function() {
    document.querySelector(".sidebar").style.width = "0";
});
