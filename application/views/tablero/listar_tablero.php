<div class="container">
    <div class="droppable">
      <div id='list' class="list" draggable="true" ondragstart="dragStart(event)">
        <div class="heading">
          <h4 class="list-title">List Heading</h4>
        </div>
        <div class="cards">
          <div class="list-card">
            <p>Card title</p>
            <span class="js-badges">
              <div class="badge is-complete">
                <span class="badge-icon">
                  <i class="ion-android-checkbox-outline fa-lg pr-1"></i>
                </span>
                <span class="badge-text">7/7</span>
              </div>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
    <div class="droppable" ondragover="allowDrop(event)" ondrop="drop(event)"></div>
  </div>
  <script>
    const dragStart = (event) => {
  event.dataTransfer.setData("text/plain", event.target.id);
}

const allowDrop = (event) => {
  event.preventDefault();
  event.currentTarget.style.background = '#7f8082';
}

const drop = (event) => {
  event.preventDefault();
  const data = event.dataTransfer.getData("text/plain");
  const element = document.querySelector(`#${data}`);
  event.currentTarget.style.background = 'white'
  try {
    event.target.appendChild(element);
  } catch (error) {
    console.warn("you can't move the item to the same place")
  }
}
  </script>
<style>
.container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  grid-column-gap: 1rem;
  grid-row-gap: 3rem;
  font-family: 'Titillium Web', sans-serif;
}

.droppable {
  width: 15rem;
  height: 15rem;
  max-height: 15rem;
  border: 1px dotted #7f8082;
  border-radius: 3px;
  padding: 0.5rem;
}

p {
  margin: 0;
  padding: 0;
}

.list {
  background: #e2e4e6;
  width: 100%;
  height: 100%;
  border-radius: 3px;
  cursor: grab;
}

.list-title {
  margin: 0;
  padding: 0.4rem 0.7rem;
}

.cards {
  padding: 0.6rem;
}

.list-card {
  background: #FFFFFF;
  border-radius: 3px;
  padding: 6px 6px 2px 8px;
  margin-bottom: 0.1rem;
}

.list-card p {
  font-size: 0.85rem;
  margin-bottom: 0.2rem;
}

.badge.is-complete {
  background-color: #61bd4f;
  color: #fff;
  border-radius: 3px;
  padding: 0.3rem 0.5rem;;
  font-size: 0.7rem;
  display: inline-block;
}
</style>