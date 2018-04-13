import home from './home/'
import login from './login/'
import single from './single/'
import category from './category/'
import index from './index/'
import front from './front/'
home.children = [
	single,
	category,
]
front.children = [
	index,
]
export default [
  home,
  login,
  front,
]
