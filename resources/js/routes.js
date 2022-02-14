import Home from './components/Home';
import About from './components/About';
import NotFound from './components/NotFound';
import EmployeesIndex from './components/employees/Index';
import EmployeesCreate from './components/employees/Create';
import EmployeesEdit from './components/employees/Edit';

export default {
    mode: 'history',
    linkActiveClass: 'font-semibold text-white bg-cyan-600 py-2 px-4 rounded-md',
    routes: [
        {
            path: '*',
            component: NotFound
        },
        {
            path: '/home',
            component: Home
        },
        {
            path: '/about',
            component: About
        },
        {
            path: '/employees-index',
            component: EmployeesIndex
        },
        {
            path: '/employees-create',
            component: EmployeesCreate
        },
        {
            path: '/employees-edit',
            component: EmployeesEdit
        },
    ]
}