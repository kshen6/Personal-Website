let whatIAm = document.getElementById('what-I-am');
let whatIDo = document.getElementById('what-I-do');
let sections = document.querySelectorAll("section");

window.addEventListener("scroll", e => {
  let fromTop = window.scrollY;
  if (
    sections[0].offsetTop + 540 >= fromTop ||
    sections[0].offsetTop + 540 <= fromTop &&
    sections[0].offsetTop + 540 + sections[0].offsetHeight > fromTop
  ) {
    whatIAm.innerHTML = "I'm a software developer,";
    whatIDo.innerHTML = "working on programs in Python, Javascript, and C++ that help people \
      connect faster and be more productive. I can offer experience in designing \
      and building scalable web applications, and work well with the fast pace of \
      iteration in a startup ecosystem.";
  } else if (
    sections[1].offsetTop + 400 <= fromTop &&
    sections[1].offsetTop + 400 + sections[1].offsetHeight > fromTop
  ) {
    whatIAm.innerHTML = "A researcher,";
    whatIDo.innerHTML = "with over four years of genetics and developmental neurobiology research experience. \
      I examine gene sets and signaling pathways, looking for patterns that help elucidate \
      the bases for human disease. \n" + " ";
  } else if (
    sections[2].offsetTop + 400 + sections[2].offsetHeight > fromTop
  ) {
    whatIAm.innerHTML = "And a musician.";
    whatIDo.innerHTML = "I can offer more than five years of freelance work experience in piano and guitar. I have played in \
      banquet halls, municipal events, and in church proceedings, and was one of 10 \
      finalists in the 2015 Parkening International Young Guitarists Competition.";
  }
});