import Home from './components/Home';
import About from './components/About';
import NotFound from './components/NotFound';
import DepartmentIndex from './components/departments/Index';
import EmployeesIndex from './components/employees/Index';
import EmployeesCreate from './components/employees/Create';
import EmployeesEdit from './components/employees/Edit';

export default {
    mode: 'history',
    linkActiveClass: 'font-semibold rounded-md',
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
            name: 'DepartmentIndex',
            path: '/department-index',
            component: DepartmentIndex
        },
        {
            name: 'EmployeeIndex',
            path: '/employees-index',
            component: EmployeesIndex
        },
        {
            name: 'EmployeeCreate',
            path: '/employees-create',
            component: EmployeesCreate
        },
        {
            name: 'EmployeeEdit',
            path: '/employees-edit/:id',
            component: EmployeesEdit
        },
    ]
}