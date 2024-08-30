const imgs =[
  {url:"../image/1.jpg",title:'圣诞树广场'},
{url:"../image/2.jpg",title:'海上黄昏'},
{url:"../image/3.jpg",title:'烟花庆典，贺祝新春'},
{url:'../image/4.jpg',title:'深夜池塘之景'},
{url:"../image/5.jpg",title:"中国版海洋世界宣传图"},
{url:"../image/6.jpg",title:'森林曙光之刻'},
]
//定时轮播
const  img =document.querySelector('.bannerImg img')
const p = document.querySelector('.banner-foot p')
let i = 0
function fn(){
img.src = imgs[i].url
p.innerHTML = imgs[i].title
document.querySelector('.fasf .active').classList.remove('active')
document.querySelector(`.fasf li:nth-child(${i+1})`).classList.add('active')
}

const left = document.querySelector('.banner-lefts')
const right = document.querySelector('.banner-rights')
left.addEventListener('click',function(){
i--
if(i < 0){
  i = imgs.length-1
}
fn()
})
right.addEventListener('click',function(){
i++
if(i >= imgs.length){
  i = 0
}
fn()
})

let n = setInterval(function(){
right.click()
},5000)

const div = document.querySelector('.banner')
div.addEventListener('mouseenter',function(){
clearInterval(n)
})
div.addEventListener('mouseleave',function(){
clearInterval(n)
n = setInterval(function(){
right.click()
},5000)
})

const sylzs = document.querySelectorAll('.sy-lzs .sy-lzs-zs li')
const lzs =[
  '1.我的世界是官方汉语译名。',
  '2.末影人不会被箭击中。',
  '3.mcpe实际上是用c++撰写的，并不是java。',
  '4.牛奶会消除一切情况。',
  '5.mc里边的生物无性别。',
  '6.你能用打火石点爆苦力怕，火不能直接烧它。',
  '7.雨天的话，炼药锅的水会渐渐被装满。',
  '8.兔子的保护色能非常好的隐藏自己。',
  '9.岩浆怪和烈焰人会被水杀死。',
  '10.在灵魂沙下面放冰块，在上面会走得更慢。',
  '11.岩浆不能防止摔伤。'
]
for(let i = 0 ; i < lzs.length ; i++){
sylzs[i].innerHTML = lzs[i]
}


const mcjj = document.querySelectorAll(`.mcjj .mcjj-twhp p`)
const mcjjimg = document.querySelectorAll('.mcjj .mcjj-twhp img')
const mcj =[
'Minecraft（《我的世界》）是一款3D沙盒电子游戏，由Mojang Studios开发。玩家可无拘无束地与由方块、实体构成的3个维度环境互动。多种玩法供玩家选择，带来无限可能。 目前Minecraft可分为Java版、基岩版和教育版。',
'Minecraft Dungeons（《我的世界：地下城》）是一款动作冒险类游戏，玩家可在这款游戏中进行战斗：独自勇闯地下城，或与最多四名朋友组队，在动感十足、充满宝藏、由程序生成的元素各不相同的关卡中一起战斗——拯救村民，打倒邪恶的奇厄教主。',
'Minecraft Dungeons Arcade（《我的世界：地下城》街机版）是前者的街机移植版，需要4位玩家共同通过关卡并击败接连不断的怪物，还可以通过扫描收藏卡获得装备、皮肤和宠物。',
'Minecraft Legends（《我的世界：传奇》）是一款即时动作战略游戏，在游戏中，玩家以第三人称视角扮演一位英雄，需要保卫据点并与成群结队的猪灵战斗，以阻止它们在下界的腐败继续传播，守护主世界。',
'Minecraft: Story Mode（《我的世界：故事模式》）是一款基于Minecraft制作的游戏，具有可点选性、叙事性、章节性。其由Mojang Studios与Telltale Games合作开发。玩家需要完成一个又一个的章节推动进程，每次选择行动都会对故事产生影响。',
'Minecraft: Story Mode - Season Two（《我的世界：故事模式 - 第二季》）是前者的续作，在原游戏的剧情基础上加入了新的故事内容，包含一些来自更新版本Minecraft的内容。',
'Minecraft Earth（《我的世界：地球》）是一款增强现实（AR）手游，玩家可以共同在现实世界建造建筑结构与收集资源，同时也存在很多与Minecraft相通之处。2021年6月30日，该游戏正式终止支持。'
]
for(let i = 0 ; i < mcj.length ; i++){
mcjj[i].innerHTML=(mcj[i])
}
const mcimg = [
'../image/75_cb=20220715074809.png',
'../image/75_cb=20220715074726.png',
'../image/75_cb=20200911162540.png',
'../image/875.png',
'../image/713.png'
]
for(let i = 0 ; i < mcimg.length ; i++){
mcjjimg[i].src = mcimg[i]
}


let time = new Date();
let year = time.getFullYear();
let month = time.getMonth();
let day = time.getDate();

const ny = document.querySelector('.xwsj-sz p')
const rq = document.querySelector('.xwsj-sz span')
ny.innerHTML = `${year}-${month+1}`
rq.innerHTML = day


const xw =[
  {riqi:'2023年9月28日',xinw:'Mojang Studios宣布停止更新Minecraft Dungeons，且1.17.0.0会是最后一个版本。'},
  {riqi:'2023年4月18日',xinw:'Minecraft Legends发布'},
  {riqi:'2022年11月29日',xinw:'Minecraft: Castle Redstone发布。'},
  {riqi:'2022年11月1日',xinw:"Minecraft: Mob Squad: Don't Fear the Creeper发布"},
  {riqi:'2022年10月15日',xinw:'Minecraft Live 2022举行。'},
  {riqi:'2023年10月5日',xinw:'基岩版1.20.32发布。'},
  {riqi:'2023年9月26-27日',xinw:'基岩版1.20.31发布。'},
  {riqi:'2023年9月21日',xinw:'Java版1.20.2发布。'},
  {riqi:'2023年9月19日',xinw:'基岩版1.20.30发布。'},
  {riqi:'2023年8月16-17日',xinw:'基岩版1.20.15发布。'}
]
const xwsj = document.querySelectorAll('.xwsj ul li')
for (let i = 0; i < xw.length; i++) {
  xwsj[i].innerHTML = `<h3>${xw[i].riqi}</h3><p>${xw[i].xinw}</p>`
}

const rqh = document.querySelectorAll('.rqym span a')
const rqp = document.querySelectorAll('.rqym span p')
const rqym =[
  {bt:'方块',pt:'Minecraft中各种各样方块的详尽资讯。'},
  {bt:'物品',pt:'Minecraft中形形色色物品的具体信息。'},
  {bt:'生物群系',pt:'悉数介绍Minecraft中全部的生物群系。'},
  {bt:'生物',pt:'介绍游戏世界中或友或敌的种种生物。'},
  {bt:'成就',pt:'基岩版中可达成的成就的细枝末节。'},
  {bt:'附魔',pt:'讲解关于Minecraft的附魔的有关信息。'},
  {bt:'状态效果',pt:'介绍Minecraft中可应用于生物的状态影响的有关信息。'},
  {bt:'交易',pt:'详解交易系统，与村民互通有无。'},
  {bt:'命令',pt:'详解Minecraft中的各种命令。'},
  {bt:'红石元件',pt:'从开与关开始，介绍红石元件的有关信息。'}
]
for(let i = 0 ; i < rqym.length ; i++){
  rqh[i].innerHTML = rqym[i].bt
  rqp[i].innerHTML = rqym[i].pt
}
const ztbox = document.querySelector('.zt-box')
const srcoll = document.querySelector('#srcolltop')
window.addEventListener('scroll',function(){
  const n = document.documentElement.scrollTop
    srcoll.style.opacity = n >= ztbox.offsetTop+50 ? 1 : 0
})
const backtop = document.querySelector('.srcolltope')
backtop.addEventListener('click',function(){
  document.documentElement.scrollTop = 0
})