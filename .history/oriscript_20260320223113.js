var base_url = document.querySelector('body').dataset.base_url; 
if(base_url == undefined) {
  base_url = "http://localhost/tkgsdh/"
}

let api = "tkgthrwheel"; 
let proc = "/p_web_tkgthrwheel";
let fullurl = base_url + api + proc;


async function SSR(url, obj, crudtype) {  
    let postData = new FormData();
    if(obj.length != 0) {
        // User
        postData.append("V_P_WORK_TYPE", obj.V_P_WORK_TYPE);
        postData.append("V_P_ID", obj.V_P_ID);
        postData.append("V_P_IS_LOSER", obj.V_P_IS_LOSER);
        postData.append("V_P_IP_ADDRESS", obj.V_P_IP_ADDRESS);
        postData.append("V_P_SPIN", obj.V_P_SPIN);
        postData.append("V_P_SALDO", obj.V_P_SALDO);
        postData.append("CRUD_TYPE", crudtype);
    }
    return fetch(url, {
        method: 'POST',
        // mode: 'no-cors',
        // headers: {"Content-Type": "application/json"},
        body: postData
    })
    .then(response => response.json())
}



const sss = document.querySelectorAll('.sss'); 
const screen5 = document.querySelector('.screen5'); 
const team = document.querySelector('.team'); 
const teams = document.querySelector('.teams'); 
const reset = document.querySelector('.reset'); 
const ucapan = document.querySelector('.ucapan'); 
const screen4 = document.querySelector('.screen4'); 
const screen3 = document.querySelector('.screen3'); 
const screen3Btn = document.querySelector('.screen3-popup .button'); 
const close = screen4.firstElementChild.firstElementChild; 
const previewimg = document.querySelector('.preview-img'); 



sss.forEach(item => item.addEventListener('click', function(e) {
      screen4.classList.add('show'); 
      previewimg.src = item.src; 
}))

close.addEventListener('click', function(e) {
    screen4.classList.remove('show'); 
    previewimg.src = ""; 
})

let loser = false; 
const winnerprice = document.querySelector('.winnerprice'); 
const money = document.querySelector('.money'); 
const withdrawbtn = document.querySelector('.withdrawbtn'); 
const losecondition = document.querySelector('.losecondition'); 
const winnercondition = document.querySelector('.winnercondition'); 
const spinnow = document.querySelector('.spinnow'); 
const sl = document.querySelector('.sl'); 
const zeusOverlay = document.querySelector('.winnerlose'); 
console.log(zeusOverlay)
const Winimage = zeusOverlay.firstElementChild.firstElementChild; 
const loseImage = zeusOverlay.firstElementChild.lastElementChild; 


let isunderplay = false; 
const header = document.querySelector('header'); 
const footer = document.querySelector('footer'); 
const screen1 = document.querySelector('.screen1'); 
const screen2 = document.querySelector('.screen2'); 
const ttid = document.querySelector('.ttid'); 
const backbutton = document.querySelector('.backbutton'); 
let spinEmp = undefined; 


backbutton.addEventListener('click', function(e) {
    ttid.value = ""; 
    header.classList.remove('show');
    footer.classList.remove('show');
    screen1.classList.remove('hide');
    screen2.classList.add('hide');
    losecondition.classList.add('hide');
    winnercondition.classList.add('hide');
})


let restofspin = document.querySelector('.restofspin'); 
let progresspin = document.querySelector('.progresspin'); 
let spinvalue = restofspin.innerHTML ; 

async function setSpinValue(onload) {
    
  spinvalue--; 
  restofspin.innerHTML = spinvalue; 
  let progress = spinvalue * 10; 
  progresspin.style.width = `${progress}%`; 
  if(spinvalue <= 0) {

      if(loser) {
          setLoser(); 
          showCondition(false, false, 2000); 
          setTimeout(() => {
            withdrawPopUp();   
          }, 2000);
      }


      return; 
  } else {
     
  }
    
}

async function setLoser() {
  spinvalue--; 

  const formattedTotal = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(0);
  
  const formattedResults = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR'
  }).format(0);
  debugEl.textContent = `Saldo jadi ${formattedResults} Rupiah :(`; 
  winnerprice.lastElementChild.innerHTML = `${formattedResults}`;
  money.innerHTML = `${formattedTotal}`;


  setTimeout(() => {
    withdrawPopUp();
  }, 4000); 
}

function getCSSVar(name) {
  return parseFloat(
    getComputedStyle(document.documentElement)
      .getPropertyValue(name)
  );
}

let icon_width = getCSSVar('--icon-width');
let icon_height = getCSSVar('--icon-height');
let num_icons = getCSSVar('--num-icons');

function getLibrary(indexes, index) {
  let libraryLength = iconMap.length; 
  let r2 = indexes[index]; 
  let r1 = ""; 
  let r3 = ""; 


  // Jika merupakan index terakhir
  if(indexes[index] == iconMap.length - 1) {
      r1 = 0;
      r3 = indexes[index] - 1; 
  } 
  // Jika merupakan index pertama
  else if(indexes[index] == 0) {
      r1 = indexes[index] + 1; 
      r3 = libraryLength - 1; 
  } 
  // Jika bukan ambil sebelahnya 
  else {
    r1 = indexes[index] + 1; 
    r3 = indexes[index] - 1; 
  }
  
  return {
    item1: iconMap[r1], 
    item2: iconMap[r2], 
    item3: iconMap[r3]
  } 
}



// --- Configuration & State ---
const debugEl = document.getElementById('debug'); 
const iconMap = ["5000", "1000", "20000", "10000", "50000", "bomb1", "100000", "bomb2", "2000"]; 
const time_per_icon = 100; 
const indexes = [0, 0, 0];

// Flag untuk Auto-win
let isFirstSpin = true; 

// Daftar index yang diperbolehkan untuk menang (Auto-win pool)
let randomWin  = [3, 2, 1, 0]; 
let randomLose = [4, 5, 6, 7]; 

// Ambil satu nilai acak dari array randomWin untuk spin pertama
const autoWinIndex = randomWin[Math.floor(Math.random() * randomWin.length)]; 
const autoLoseIndex = randomLose[Math.floor(Math.random() * randomLose.length)]; 


/**
 * Roll function
 */
const roll = (reel, offset = 0, forcedDelta = null) => {
  const deltaPerReel = (forcedDelta !== null) ? forcedDelta : Math.floor(Math.random() * num_icons);
  const delta = (offset + 2) * num_icons + deltaPerReel;

  return new Promise((resolve) => {
    const style = getComputedStyle(reel),
      backgroundPositionY = parseFloat(style["background-position-y"]),
      targetBackgroundPositionY = backgroundPositionY + delta * icon_height,
      normTargetBackgroundPositionY = targetBackgroundPositionY % (num_icons * icon_height);

    setTimeout(() => {
      reel.style.transition = `background-position-y ${(8 + 1 * delta) * time_per_icon}ms cubic-bezier(.41,-0.01,.63,1.09)`;
      reel.style.backgroundPositionY = `${targetBackgroundPositionY}px`;
    }, offset * 150);

    setTimeout(() => {
      reel.style.transition = `none`;
      reel.style.backgroundPositionY = `${normTargetBackgroundPositionY}px`;
      resolve(delta % num_icons);
    }, (8 + 1 * delta) * time_per_icon + offset * 150);
  });
};

function rollAll() {
  // if (typeof isunderplay !== 'undefined' && isunderplay) return;
  
  debugEl.textContent = 'rolling...';
  const hritem = document.querySelectorAll('.hr-item'); 
  
  hritem.forEach(item => {
    item.querySelectorAll('.box').forEach(i => i.classList.remove('winner', 'loser'));
  });

  const reelsList = document.querySelectorAll('.sl > .reel');
  
  const promises = [...reelsList].map((reel, i) => {
    if (restofspin.innerHTML == "3") {
      // Menggunakan autoWinIndex yang sudah dipilih secara acak dari array randomWin
      let currentPos = indexes[i];
      let neededDelta = (autoWinIndex - currentPos + num_icons) % num_icons;
      return roll(reel, i, neededDelta);
    } else if(restofspin.innerHTML == "1") {
      // Menggunakan autoWinIndex yang sudah dipilih secara acak dari array randomWin
      let currentPos = indexes[i];
      let neededDelta = (autoLoseIndex - currentPos + num_icons) % num_icons;
      return roll(reel, i, neededDelta);
    } else {
      return roll(reel, i);
    }
  });

  Promise.all(promises).then(deltas => {
    deltas.forEach((delta, i) => {
      indexes[i] = (indexes[i] + delta) % num_icons;
    });

    let r1 = getLibrary(indexes, 0); 
    let r2 = getLibrary(indexes, 1); 
    let r3 = getLibrary(indexes, 2); 
    
    determineWinner(r1, r2, r3, hritem); 
    
    if (isFirstSpin) {
        console.log(`First spin win with icon: ${iconMap[autoWinIndex]}`);
        isFirstSpin = false;
    }

    if (typeof isunderplay !== 'undefined') isunderplay = false; 
  });
};


function determineWinner(r1,r2,r3, hritem) {
    let jackpot = false; 
    let er1 = hritem[0].querySelectorAll('.box'); 
    let er2 = hritem[1].querySelectorAll('.box'); 
    let er3 = hritem[2].querySelectorAll('.box'); 
    console.log(er1)


    console.log(r1)
    console.log(r2)
    console.log(r3)
    console.log(r1.item1)

    let results = 0; 
    //  Loser condition
    if(r1.item1.includes('bomb') && r2.item1.includes('bomb') && r3.item1.includes('bomb')) {
      er1[0].classList.add('loser');
      er2[0].classList.add('loser');
      er3[0].classList.add('loser');
      showCondition(false, false, 2000); 
      loser = true; 
      setLoser(); 
      return;
    } else if(r1.item2.includes('bomb') && r2.item2.includes('bomb') && r3.item2.includes('bomb')) {
      er1[1].classList.add('loser');
      er2[1].classList.add('loser');
      er3[1].classList.add('loser');
      showCondition(false, false, 2000); 
      loser = true; 
      setLoser(); 
      return;
    } else if(r1.item3.includes('bomb') && r2.item3.includes('bomb') && r3.item3.includes('bomb')) {
      er1[2].classList.add('loser');
      er2[2].classList.add('loser');
      er3[2].classList.add('loser');
      showCondition(false, false, 2000); 
      loser = true; 
      setLoser(); 
      return;
    } 
    // Loser miring
    else if(r1.item1.includes('bomb') && r2.item2.includes('bomb') && r3.item3.includes('bomb')) {
      er1[0].classList.add('loser');
      er2[1].classList.add('loser');
      er3[2].classList.add('loser');
      showCondition(false, false, 2000); 
      loser = true; 
      setLoser(); 
      return;
    } else if(r1.item3.includes('bomb') && r2.item2.includes('bomb') && r3.item1.includes('bomb')) {
      er1[2].classList.add('loser');
      er2[1].classList.add('loser');
      er3[0].classList.add('loser');
      showCondition(false, false, 2000); 
      loser = true; 
      setLoser(); 
      return;
    } 

    // Jackpot Condition
    if(r1.item1 == r2.item1 && r2.item1 == r3.item1) {
        results += parseInt(r1.item1) + parseInt(r2.item1) + parseInt(r3.item1); 
        er1[0].classList.add('winner');
        er2[0].classList.add('winner');
        er3[0].classList.add('winner');
        jackpot = true; 
    } 
    // Partial winner condition
    else {
       if(r1.item1 == r2.item1 && !r1.item1.includes('bomb')) {
          er1[0].classList.add('winner');
          er2[0].classList.add('winner');
          results += parseInt(r1.item1) + parseInt(r2.item1); 
       }
       else if(r2.item1 == r3.item1 && !r2.item1.includes('bomb')) {
          er2[0].classList.add('winner');
          er3[0].classList.add('winner');
          results += parseInt(r2.item1) + parseInt(r3.item1); 
       }
    }

    // Jackpot Condition
    if(r1.item2 == r2.item2 && r2.item2 == r3.item2) {
        results += parseInt(r1.item2) + parseInt(r2.item2) + parseInt(r3.item2); 
        er1[1].classList.add('winner');
        er2[1].classList.add('winner');
        er3[1].classList.add('winner');
        jackpot = true; 
    } 
    // Partial winner condition
    else {
      if(r1.item2 == r2.item2 && !r1.item2.includes('bomb')) {
          er1[1].classList.add('winner');
          er2[1].classList.add('winner');
          results += parseInt(r1.item2) + parseInt(r2.item2); 
      }
      else if(r2.item2 == r3.item2 && !r2.item2.includes('bomb')) {
          er2[1].classList.add('winner');
          er3[1].classList.add('winner');
          results += parseInt(r2.item2) + parseInt(r3.item2); 
      }
    }

    // Jackpot Condition
    if(r1.item3 == r2.item3 && r2.item3 == r3.item3) {
        results += parseInt(r1.item3) + parseInt(r2.item3) + parseInt(r3.item3); 
        er1[2].classList.add('winner');
        er2[2].classList.add('winner');
        er3[2].classList.add('winner');
        jackpot = true; 
    } 
    // Partial winner condition
    else {
      if(r1.item3 == r2.item3 && !r1.item3.includes('bomb')) {
          er1[2].classList.add('winner');
          er2[2].classList.add('winner');
          results += parseInt(r1.item3) + parseInt(r2.item3); 
      }
      else if(r2.item3 == r3.item3 && !r2.item3.includes('bomb')) {
          er2[2].classList.add('winner');
          er3[2].classList.add('winner');
          results += parseInt(r2.item3) + parseInt(r3.item3); 
      }
    }


      // Untuk miring kiri atas ke kanan bawah
    if(r1.item1 == r2.item2 && r2.item2 == r3.item3) {
        er1[0].classList.add('winner');
        er2[1].classList.add('winner');
        er3[2].classList.add('winner');
        results += parseInt(r1.item1) + parseInt(r2.item2) + parseInt(r3.item3); 
        jackpot = true; 
    } else {
        if(r1.item1 == r2.item2 && !r1.item1.includes('bomb')) {
            er1[0].classList.add('winner');
            er2[1].classList.add('winner');
            results += parseInt(r1.item1) + parseInt(r2.item2); 
        }
        else if(r2.item2 == r3.item3 && !r2.item2.includes('bomb')) {
            er2[1].classList.add('winner');
            er3[2].classList.add('winner');
            results += parseInt(r2.item2) + parseInt(r3.item3); 
        }
    }

    // Untuk miring kanan atas ke kiri bawah
    if(r3.item1 == r2.item2 && r2.item2 == r1.item3) {
        er3[0].classList.add('winner');
        er2[1].classList.add('winner');
        er1[2].classList.add('winner');
        results += parseInt(r3.item1) + parseInt(r2.item2) + parseInt(r3.item3); 
        jackpot = true; 
    } else {
        if(r3.item1 == r2.item2 && !r3.item1.includes('bomb')) {
            er3[0].classList.add('winner');
            er2[1].classList.add('winner');
            results += parseInt(r3.item1) + parseInt(r2.item2); 
        }
        else if(r2.item2 == r1.item3 && !r2.item2.includes('bomb')) {
            er2[1].classList.add('winner');
            er1[2].classList.add('winner');
            results += parseInt(r2.item2) + parseInt(r1.item3); 
        }
    }
    
    if(winnerprice.lastElementChild.dataset.price == "0") {
       winnerprice.lastElementChild.dataset.price = results; 
    } else {
       winnerprice.lastElementChild.dataset.price = parseInt(winnerprice.lastElementChild.dataset.price) + parseInt(results); 
    }

    if(parseInt(results) > 0) {
        if(jackpot) showCondition(true, true, 4000); 
        else if(parseInt(results) > 50000) showCondition(true, true, 4000); 
        else showCondition(false, true, 2000); 

    }

    if(results == "0") {
      debugEl.textContent = `You have ${spinvalue - 1} Spin Left :(`; 
    } else {
        const formattedTotal = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        }).format(winnerprice.lastElementChild.dataset.price);
        
        const formattedResults = new Intl.NumberFormat('id-ID', {
          style: 'currency',
          currency: 'IDR'
        }).format(results);
        debugEl.textContent = `Win ${formattedResults} Rupiah!`; 
        winnerprice.lastElementChild.innerHTML = `${formattedResults}`;
        money.innerHTML = `${formattedTotal}`;
    }

    setSpinValue(); 
}


function showCondition(jackpot, winorlose, timeout) {
  Winimage.classList.add('hide');
  loseImage.classList.add('hide');
  if(winorlose) {
      let winCls = "win1";
      Winimage.classList.remove('hide'); 
      if(jackpot) {
        zeusOverlay.classList.add('show'); 
        winCls = "win2"; 
      }
      sl.classList.add(winCls);
      setTimeout(() => {
          sl.classList.remove(winCls)
          if(jackpot) zeusOverlay.classList.remove('show');
      }, timeout);
  } else {
      zeusOverlay.classList.add('show'); 
      loseImage.classList.remove('hide'); 
      setTimeout(() => {
          zeusOverlay.classList.remove('show');
      }, timeout);
  }
}

spinnow.addEventListener('click', async function(e) {
  if(spinvalue <= 0) {
    alert("You cannot spin anymore. Withdraw now!"); 
    return; 
  } else {
      if(!loser) {
        if(!isunderplay) {
            isunderplay = true; 
            setTimeout(rollAll, 0);
        }
      } else {
          alert("You already lose. withraw now !"); 
      }
  }

  
})

withdrawbtn.addEventListener('click', function(e) {
  withdrawPopUp(); 
})
reset.addEventListener('click', function(e) {
  window.location.reload(); 
})

function withdrawPopUp() {
  if(money.innerHTML != 'Rp. 0') {
     screen3.classList.add('show')   
  } else {
     alert("Saldo 0 Ga bisa di withdraw"); 
  }
  
}


window.addEventListener('load', async function(e) {
    setTimeout(() => {
      screen3.style.transition = 'all 1s ease 0s'; 
      let elements = members.map(item => ig(item)).join(''); 
      team.innerHTML = elements; 
    }, 500);
})


screen3Btn.addEventListener('click', function(e) {
    if(this.firstElementChild.innerHTML == "NEXT") {
        this.firstElementChild.innerHTML = "OK"; 
        ucapan.classList.add('hide'); 
        teams.classList.remove('hide'); 

       
    } else {
        screen3Btn.parentElement.classList.add('animate2'); 
        setTimeout(() => {
          screen3.classList.add('animate2'); 
          screen5.classList.add('show'); 
          setTimeout(() => {
            screen3.classList.remove('animate2'); 
            screen3.classList.remove('show'); 
          }, 1000);
        }, 1000);
    }
    
})


  let members = [
    'mbimoad', 'friagustam', 'elizre', 'mayus29', 'rezabayupamungkas', 
    'asnur653', 'qiarman', 'sitinj_rk', 'prayogaepiwanms1', 'asyidiqkurnia', 
    'dax_bageur88', 'dkxviii', 'asep15saepudin', 'odhnurzaman', 'hasanbadriawan', 
    'andhikaaulia_mochhend22', 'adistydyvaa', 'ajinrz', 'Oghianinur', 
    'koni_saputral', 'rasida', 'rizallblack', 'enjang', 'achmad_mahdum', 
    'ggkw02', 'mr.sianturi'
  ];


function ig(name) {
  return ` <div class="ig">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.8 2H16.2C19.4 2 22 4.6 22 7.8V16.2C22 17.7383 21.3889 19.2135 20.3012 20.3012C19.2135 21.3889 17.7383 22 16.2 22H7.8C4.6 22 2 19.4 2 16.2V7.8C2 6.26174 2.61107 4.78649 3.69878 3.69878C4.78649 2.61107 6.26174 2 7.8 2ZM7.6 4C6.64522 4 5.72955 4.37928 5.05442 5.05442C4.37928 5.72955 4 6.64522 4 7.6V16.4C4 18.39 5.61 20 7.6 20H16.4C17.3548 20 18.2705 19.6207 18.9456 18.9456C19.6207 18.2705 20 17.3548 20 16.4V7.6C20 5.61 18.39 4 16.4 4H7.6ZM17.25 5.5C17.5815 5.5 17.8995 5.6317 18.1339 5.86612C18.3683 6.10054 18.5 6.41848 18.5 6.75C18.5 7.08152 18.3683 7.39946 18.1339 7.63388C17.8995 7.8683 17.5815 8 17.25 8C16.9185 8 16.6005 7.8683 16.3661 7.63388C16.1317 7.39946 16 7.08152 16 6.75C16 6.41848 16.1317 6.10054 16.3661 5.86612C16.6005 5.6317 16.9185 5.5 17.25 5.5ZM12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7ZM12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9Z" fill="black"/>
                                </svg>    
                                <span>${name}</span>   
                            </div>`; 
}


