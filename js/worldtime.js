function getTime(){

const url1 = "https://worldtimeapi.org/api/timezone/america/new_york";
const url2 = "https://worldtimeapi.org/api/timezone/europe/berlin";
const url3 = "";
const url4 = "";

fetchTime(url1);
fetchTime(url2);


  //console.log("datetime is"+res.datetime);
  //return res.datetime;

async function fetchTime(timezoneurl) {
    let response = await fetch(timezoneurl);
    //let data = await response.text();
    let data = await response.json();
    console.log(data);
    let timex = data.datetime;
    console.log("datetime="+timex);
}


}
getTime().then(data => console.log(data));
getTime().then((data) => console.log(.data));


/*
axios.get("http://worldtimeapi.org/api/timezone/America/New_York")
        .then(response => {
          console.log(response.data);
        })
        .catch(error => console.error(error));

axios.get("http://worldtimeapi.org/api/timezone/Europe/Berlin")
        .then(response => {
          console.log(response.data);
        })
        .catch(error => console.error(error));

axios.get("http://worldclockapi.com/api/json/utc/now")
        .then(response => {
          console.log(response.data);
        })
        .catch(error => console.error(error));

axios.get("http://worldtimeapi.org/api/ip")
        .then(response => {
          console.log(response.data);
        })
        .catch(error => console.error(error));
*/
