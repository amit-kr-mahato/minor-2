window.addEventListener("load", () => {
    let leftpanel = document.querySelectorAll(".planel:nth-child(-n+10)");
    let rightpanel = document.querySelectorAll(".planel:nth-child(n+11)");
    gsap.to(leftpanel, {
      y: "100%",
      stagger: -0.1,
      duration:0.4

    });

    gsap.to(rightpanel, {
      y: "100%",
      stagger: 0.1,
      duration:0.4

    });
  })