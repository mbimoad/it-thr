const spinnow = document.querySelector('.spinnow'); 
const sl = document.querySelector('.sl'); 
const zeusOverlay = document.querySelector('.zeus-overlay'); 
let isunderplay = false; 
const ambil = document.querySelector('.ambil'); 
console.log(ambil)
const header = document.querySelector('header'); 
const footer = document.querySelector('footer'); 
const screen1 = document.querySelector('.screen1'); 
const screen2 = document.querySelector('.screen2'); 
const ttid = document.querySelector('.ttid'); 
const backbutton = document.querySelector('.backbutton'); 
ambil.addEventListener('click', function(e) {
    // if(ttid.value.length != 10) {
    //     let userid = ttid.value.toUpperCase(); 
    //     alert("Please input valid user id"); 
    //     ttid.value = ""; 
    //     return; 
    // }
    header.classList.add('show');
    footer.classList.add('show');
    screen1.classList.add('hide');
    screen2.classList.remove('hide');
})

backbutton.addEventListener('click', function(e) {
    ttid.value = ""; 
    header.classList.remove('show');
    footer.classList.remove('show');
    screen1.classList.remove('hide');
    screen2.classList.add('hide');
})


function getCSSVar(name) {
  return parseFloat(
    getComputedStyle(document.documentElement)
      .getPropertyValue(name)
  );
}

let icon_width = getCSSVar('--icon-width');
let icon_height = getCSSVar('--icon-height');
let num_icons = getCSSVar('--num-icons');

window.addEventListener('resize', () => {
  icon_width = getCSSVar('--icon-width');
  icon_height = getCSSVar('--icon-height');
});

console.log(icon_width)
console.log(icon_height)


// Game judol 
/**
 * Setup
 */
const debugEl = document.getElementById('debug'),
  // Mapping of indexes to icons: start from banana in middle of initial position and then upwards
  // iconMap = ["banana", "seven", "cherry", "plum", "orange", "bell", "bar", "lemon", "melon"],
  iconMap = ["5000", "1000", "20000", "10000", "50000", "bomb", "10000", "bomb", "2000"],
  // Max-speed in ms for animating one icon down
  time_per_icon = 100,
  // Holds icon indexes
  indexes = [0, 0, 0];

/** 
 * Roll one reel
 */
const roll = (reel, offset = 0) => {
  // Minimum of 2 + the reel offset rounds
  const delta = (offset + 2) * num_icons + Math.round(Math.random() * num_icons);

  // Return promise so we can wait for all reels to finish
  return new Promise((resolve, reject) => {
    const style = getComputedStyle(reel),
      // Current background position
      backgroundPositionY = parseFloat(style["background-position-y"]),
      // Target background position
      targetBackgroundPositionY = backgroundPositionY + delta * icon_height,
      // Normalized background position, for reset
      normTargetBackgroundPositionY = targetBackgroundPositionY % (num_icons * icon_height);

    // Delay animation with timeout, for some reason a delay in the animation property causes stutter
    setTimeout(() => {
      // Set transition properties ==> https://cubic-bezier.com/#.41,-0.01,.63,1.09
      reel.style.transition = `background-position-y ${(8 + 1 * delta) * time_per_icon}ms cubic-bezier(.41,-0.01,.63,1.09)`;
      // Set background position
      reel.style.backgroundPositionY = `${backgroundPositionY + delta * icon_height}px`;
    }, offset * 150);

    // After animation
    setTimeout(() => {
      // Reset position, so that it doesn't get higher without limit
      reel.style.transition = `none`;
      reel.style.backgroundPositionY = `${normTargetBackgroundPositionY}px`;
      // Resolve this promise
      resolve(delta % num_icons);
    }, (8 + 1 * delta) * time_per_icon + offset * 150);
  });
};

/**
 * Roll all reels, when promise resolves roll again
 */
function rollAll() {
  debugEl.textContent = 'rolling...';
  const reelsList = document.querySelectorAll('.sl > .reel');
  Promise

  // Activate each reel, must convert NodeList to Array for this with spread operator
  .all([...reelsList].map((reel, i) => roll(reel, i)))

  // When all reels done animating (all promises solve)
  .then(deltas => {
    // add up indexes
    deltas.forEach((delta, i) => indexes[i] = (indexes[i] + delta) % num_icons);
    debugEl.textContent = indexes.map(i => iconMap[i]).join(' - ');

    // Win conditions
    // Jackpot
    if(indexes[0] == indexes[1] && indexes[1] == indexes[2]) {
        if(indexes[0] == "bomb") {
          alert("You lose");
        } else {
          zeusOverlay.classList.add('show'); 
          const winCls = indexes[0] == indexes[2] ? "win2" : "win1";
          sl.classList.add(winCls);
          setTimeout(() => {
            sl.classList.remove(winCls)
            zeusOverlay.classList.remove('show');
          }, 3000);
        }
    }
    // Partial Win
    else if (indexes[0] == indexes[1] || indexes[1] == indexes[2]) {
      if(indexes[0] == "bomb" || indexes[1] == "bomb") {
        alert("You lose");
      } 
      else {
          const winCls = indexes[0] == indexes[2] ? "win2" : "win1";
          sl.classList.add(winCls);
          setTimeout(() => {
            sl.classList.remove(winCls)
          }, 2000);
      }
    }
    isunderplay = false; 
    // Again!
    // setTimeout(rollAll, 3000);
  });
}
;

// Kickoff
// setTimeout(rollAll, 1000);


spinnow.addEventListener('click', function(e) {
  if(!isunderplay) {
      isunderplay = true; 
      setTimeout(rollAll, 0);
  }
})