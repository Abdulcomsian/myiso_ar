<?php

namespace App\Http\Controllers;

use App\Incident;

class IncidentController extends SimpleRegisterController
{
    protected function model()
    {
        return Incident::class;
    }

    protected function module()
    {
        return [
            'key' => 'incidents',
            'admin_url' => 'incidentsad',
            'title' => 'الحوادث والإصابات',
            'subtitle' => 'تسجيل جميع الحوادث والإصابات والحوادث الوشيكة في العمل.',
            'info_title' => 'أبلغ عن الحوادث فور وقوعها:',
            'info_items' => ['تعرّض شخص لإصابة', 'كاد أن يقع أمر خطير (حادث وشيك)', 'حادث أو ضرر في الممتلكات'],
            'add_label' => 'الإبلاغ عن حادث جديد',
            'edit_title' => 'تعديل الحادث',
            'item_name' => 'حادث',
            'search_placeholder' => 'ابحث في الحوادث…',
            'empty' => 'لم يتم تسجيل أي حوادث بعد.',
            'icon' => 'fa-user-injured',
            'label_field' => 'description',
            'fields' => [
                // Order matters: short fields pair up in the 2-column form, textareas take a full row
                'incident_date' => ['label' => 'تاريخ الحادث', 'type' => 'date', 'required' => true],
                'status' => ['label' => 'الحالة', 'type' => 'select', 'default' => 'open', 'options' => [
                    'open' => 'مفتوح',
                    'investigating' => 'قيد التحقيق',
                    'closed' => 'مغلق',
                ]],
                'description' => ['label' => 'الوصف', 'type' => 'textarea','placeholder' => 'ماذا حدث؟ وما سبب الحادث؟'],
                'injured_person' => ['label' => 'الشخص المعني / المصاب', 'type' => 'text','placeholder' => 'اسم الشخص المتضرر'],
                'severity' => ['label' => 'شدة الإصابة', 'type' => 'select', 'options' => [
                    'none' => 'لا توجد إصابة (حادث وشيك)',
                    'minor' => 'طفيفة',
                    'moderate' => 'متوسطة',
                    'severe' => 'شديدة',
                ]],
                'location' => ['label' => 'الموقع / القسم', 'type' => 'text','placeholder' => 'أين وقع الحادث؟'],
                'witnesses' => ['label' => 'أسماء الشهود', 'type' => 'text', 'placeholder' => 'أسماء الأشخاص الذين شاهدوا الحادث (اختياري)'],
                'first_aid' => ['label' => 'الإسعافات الأولية المقدمة', 'type' => 'textarea', 'placeholder' => 'ما الإسعافات الأولية التي قُدمت؟ (اختياري)'],
                'investigation' => ['label' => 'نتائج التحقيق', 'type' => 'textarea', 'placeholder' => 'ما توصلنا إليه حول سبب وقوع الحادث (اختياري)'],
                'corrective_actions' => ['label' => 'الإجراءات التصحيحية', 'type' => 'textarea', 'placeholder' => 'ما سنفعله لمنع تكراره (اختياري)'],
            ],
            'columns' => [
                'incident_date' => 'التاريخ',
                'description' => 'الوصف',
                'injured_person' => 'المصاب',
                'severity' => 'الشدة',
                'location' => 'الموقع',
                'status' => 'الحالة',
            ],
            // chip colour per select value
            'chips' => [
                'severity' => ['none' => 'info', 'minor' => 'success', 'moderate' => 'warning', 'severe' => 'danger'],
                'status' => ['open' => 'danger', 'investigating' => 'warning', 'closed' => 'success'],
            ],
        ];
    }
}
