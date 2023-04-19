function getWeather() {
    const city = document.getElementById("city").value;
    const apiKey = "2e76ff033f2576a9fb2d626729a3bfdf"; // api key openweathermap.org
    const url = "https://api.openweathermap.org/data/2.5/weather?q=" + city + "&appid=" + apiKey + "&units=metric";

    fetch(url)
      .then(response => response.json())
      .then(data => {
        const weather = document.getElementById("weather");
        const weatherTwo = document.getElementById("weathertwo");
        console.log(data);
        weather.innerHTML = "Текущая температура в городе " + data.name + ": " + data.main.temp + "°C";
        weatherTwo.innerHTML = "Ветер: " + data.wind.speed + ' м/c';
      })
      .catch(error => {
        weather.innerHTML = 'Уточните название города!';
        console.log(error);
      });
}