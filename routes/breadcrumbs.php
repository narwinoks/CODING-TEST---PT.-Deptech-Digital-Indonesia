<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('home.index', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home.index'));
});
Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin.index'));
});
Breadcrumbs::for('admin.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Create', route('admin.create'));
});
Breadcrumbs::for('admin.edit', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('admin.index');
    $trail->push('Edit', route('admin.edit', $author));
});
Breadcrumbs::for('employee.index', function (BreadcrumbTrail $trail) {
    $trail->push('Employee', route('employee.index'));
});
Breadcrumbs::for('employee.create', function (BreadcrumbTrail $trail) {
    $trail->parent('employee.index');
    $trail->push('Create', route('employee.create'));
});
Breadcrumbs::for('employee.edit', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('employee.index');
    $trail->push('Edit', route('employee.edit', $author));
});
Breadcrumbs::for('absences.index', function (BreadcrumbTrail $trail) {
    $trail->push('Absences', route('absences.index'));
});
Breadcrumbs::for('absences.create', function (BreadcrumbTrail $trail) {
    $trail->parent('absences.index');
    $trail->push('Create', route('absences.create'));
});
Breadcrumbs::for('absences.edit', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('absences.index');
    $trail->push('Edit', route('absences.edit', $author));
});
Breadcrumbs::for('absences.employee.index', function (BreadcrumbTrail $trail) {
    $trail->push('Absences Employee', route('absences.employee.index'));
});
Breadcrumbs::for('absences.employee.show', function (BreadcrumbTrail $trail, $author) {
    $trail->parent('absences.employee.index');
    $trail->push('Show', route('absences.employee.show', $author));
});


Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home.index');
    $trail->push('Profile', route('profile'));
});
