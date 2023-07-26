console.clear();

let eventsGenerator = {
  getEventList: function() {
    return document.querySelector("#event-list") ?? "#event-list";
  },
  events: [],
  generateId: function() {
    return Date.now();
  },

  generateEvent: function() {
    return {};
  },

  addEvent: function({name, desc, hosts, date, time, image, alt}) {  
    let newEvent = this.generateEvent();
    
    newEvent["id"] = this.generateId();
    newEvent["event name"] = name;
    newEvent["event description"] = desc;
    newEvent["event date"] = date;
    newEvent["event time"] = time;
    newEvent["event hosts"] = hosts;
    newEvent["event image"] = image;
    newEvent["event alt"] = alt;
    
    this.events.push(newEvent);
  },

  generateEventCard: function() {
    
    if (this.events.length === 0) {
      console.log("no data available");
    } else {
      let eventCard = "";
      this.events.forEach((event, elem) => {
        eventCard += `
        <li>
          <event-card>
            <event-details>
              <h2>${event["event name"]}</h2>
              <picture class='picture-${elem}'>
                <img src= "${event['event image']}" alt="${event['event alt']}">
              </picture>
              <p>${event["event description"]}</p>
            </event-details>

            <details>
              <summary>${event["event name"]}</summary>
               
               <ul>
                <li><span>date: </span>${event["event date"]}</li>
                <li><span>time: </span>${event["event time"]}</li>
                <li><span>hosts: </span>${event["event hosts"]}</li>
                <li><a href="#">event details</a></li>
               </ul>
               
            </details>
          </event-card>
        </li>
        `;
      });
      return eventCard;
    }
    setTimeout(this.generateEventCard(), 3000);
  },
  getNumberOfEvents: function() {
    return eventList.childElementCount;
  },
  applyLayout: function() {
    let numOfEvents = this.getNumberOfEvents();
    if (numOfEvents === 2) {
      this.getEventList().style.display = "flex";
      this.getEventList().style.alignItems = "center";
      this.getEventList().style.gridGap = "10px";
    }
    if (numOfEvents >= 3) {
       this.getEventList().style.display = "grid";
        this.getEventList().style.gridGap = "10px";
        this.getEventList().style.gridTemplateColumns = "repeat(auto-fit, 186px)";
        // console.log("3 or more events", this.getNumberOfEvents());
    }
    setTimeout(() => {
      this.applyLayout();
    
    }, 3000);
  }
};

eventsGenerator.addEvent({
  name: "PE bootcamp",
  desc: "a great place to learn",
  hosts: "harry potter",
  date: "7/29/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 1"
});

eventsGenerator.addEvent({
  name: "Another event",
  desc: "Description of another event",
  hosts: "harry potter",
  date: "8/5/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 2"
});

eventsGenerator.addEvent({
  name: "YAY another event",
  desc: "not another desc of another event",
  hosts: "harry potter",
  date: "8/5/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 2"
});

eventsGenerator.addEvent({
  name: " another news news nes",
  desc: "cats catcs cats",
  hosts: "larry potter",
  date: "8/2/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 6"
});

eventsGenerator.addEvent({
  name: " another news news nes",
  desc: "cats catcs cats",
  hosts: "larry potter",
  date: "8/2/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 6"
});

eventsGenerator.addEvent({
  name: " another news news nes",
  desc: "cats catcs cats",
  hosts: "larry potter",
  date: "8/2/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 6"
});

eventsGenerator.addEvent({
  name: " another news news nes",
  desc: "cats catcs cats",
  hosts: "larry potter",
  date: "8/2/23",
  time: "10",
  image: "https://peprojects.dev/images/square.jpg",
  alt: "alt text 6"
});

let eventList = eventsGenerator.getEventList();
eventList.insertAdjacentHTML("afterbegin", eventsGenerator.generateEventCard());

eventsGenerator.applyLayout();