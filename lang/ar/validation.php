<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'accepted_if' => 'يجب قبول :attribute عندما يكون :other يساوي :value.',
    'active_url' => ' :attribute يجب أن يكون رابطاً صحيحاً.',
    'after' => ' :attribute يجب أن يكون تاريخاً بعد :date.',
    'after_or_equal' => ' :attribute يجب أن يكون تاريخاً بعد أو يساوي :date.',
    'alpha' => ' :attribute يجب أن يحتوي على أحرف فقط.',
    'alpha_dash' => ' :attribute يجب أن يحتوي فقط على أحرف، أرقام، شرطات، وشرطات سفلية.',
    'alpha_num' => ' :attribute يجب أن يحتوي فقط على أحرف وأرقام.',
    'array' => ' :attribute يجب أن يكون مصفوفة.',
    'ascii' => ' :attribute يجب أن يحتوي فقط على رموز وأحرف ASCII.',
    'before' => ' :attribute يجب أن يكون تاريخاً قبل :date.',
    'before_or_equal' => ' :attribute يجب أن يكون تاريخاً قبل أو يساوي :date.',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة  :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يحتوي  :attribute على عدد حروف بين :min و :max.',
        'array' => 'يجب أن يحتوي  :attribute على عدد عناصر بين :min و :max.',
    ],
    'boolean' => ' :attribute يجب أن يكون صح أو خطأ.',
    'confirmed' => 'تأكيد  :attribute لا يطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => ' :attribute يجب أن يكون تاريخاً صالحاً.',
    'date_equals' => ' :attribute يجب أن يكون تاريخاً يساوي :date.',
    'date_format' => ' :attribute يجب أن يتوافق مع الشكل :format.',
    'declined' => 'يجب رفض  :attribute.',
    'declined_if' => 'يجب رفض  :attribute عندما يكون :other يساوي :value.',
    'different' => ' :attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ' :attribute يجب أن يحتوي على :digits أرقام.',
    'digits_between' => ' :attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => 'أبعاد الصورة في  :attribute غير صالحة.',
    'distinct' => ' :attribute يحتوي على قيمة مكررة.',
    'email' => ' :attribute يجب أن يكون بريدًا إلكترونيًا صالحًا.',
    'ends_with' => ' :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'exists' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'file' => ' :attribute يجب أن يكون ملفاً.',
    'filled' => ' :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'numeric' => ' :attribute يجب أن يكون أكبر من :value.',
        'file' => ' :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'string' => ' :attribute يجب أن يحتوي على أكثر من :value حروف.',
        'array' => ' :attribute يجب أن يحتوي على أكثر من :value عناصر.',
    ],
    'gte' => [
        'numeric' => ' :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'file' => ' :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'string' => ' :attribute يجب أن يحتوي على :value حروف أو أكثر.',
        'array' => ' :attribute يجب أن يحتوي على :value عناصر أو أكثر.',
    ],
    'image' => ' :attribute يجب أن يكون صورة.',
    'in' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'in_array' => ' :attribute غير موجود في :other.',
    'integer' => ' :attribute يجب أن يكون عدداً صحيحاً.',
    'ip' => ' :attribute يجب أن يكون عنوان IP صالح.',
    'ipv4' => ' :attribute يجب أن يكون عنوان IPv4 صالح.',
    'ipv6' => ' :attribute يجب أن يكون عنوان IPv6 صالح.',
    'json' => ' :attribute يجب أن يكون نص JSON صالح.',
    'lt' => [
        'numeric' => ' :attribute يجب أن يكون أقل من :value.',
        'file' => ' :attribute يجب أن يكون أقل من :value كيلوبايت.',
        'string' => ' :attribute يجب أن يحتوي على أقل من :value حروف.',
        'array' => ' :attribute يجب أن يحتوي على أقل من :value عناصر.',
    ],
    'lte' => [
        'numeric' => ' :attribute يجب أن يكون أقل من أو يساوي :value.',
        'file' => ' :attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'string' => ' :attribute يجب أن يحتوي على :value حروف أو أقل.',
        'array' => ' :attribute لا يجب أن يحتوي على أكثر من :value عناصر.',
    ],
    'max' => [
        'numeric' => ' :attribute لا يجب أن يكون أكبر من :max.',
        'file' => ' :attribute لا يجب أن يكون أكبر من :max كيلوبايت.',
        'string' => ' :attribute لا يجب أن يحتوي على أكثر من :max حروف.',
        'array' => ' :attribute لا يجب أن يحتوي على أكثر من :max عناصر.',
    ],
    'mimes' => ' :attribute يجب أن يكون ملف من نوع: :values.',
    'mimetypes' => ' :attribute يجب أن يكون ملف من نوع: :values.',
    'min' => [
        'numeric' => ' :attribute يجب أن يكون على الأقل :min.',
        'file' => ' :attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'string' => ' :attribute يجب أن يحتوي على الأقل :min حروف.',
        'array' => ' :attribute يجب أن يحتوي على الأقل :min عناصر.',
    ],
    'multiple_of' => ' :attribute يجب أن يكون مضاعفاً لـ :value.',
    'not_in' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'not_regex' => 'صيغة  :attribute غير صالحة.',
    'numeric' => ' :attribute يجب أن يكون رقماً.',
    'password' => [
        'letters' => ' :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => ' :attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => ' :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => ' :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => ' :attribute تم تسريبه في تسريب بيانات. الرجاء اختيار كلمة مرور مختلفة.',
    ],
    'present' => ' :attribute يجب أن يكون موجوداً.',
    'regex' => 'صيغة  :attribute غير صالحة.',
    'required' => ' :attribute مطلوب.',
    'required_array_keys' => ' :attribute يجب أن يحتوي على مدخلات لـ: :values.',
    'required_if' => ' :attribute مطلوب عندما يكون :other يساوي :value.',
    'required_unless' => ' :attribute مطلوب ما لم يكن :other في :values.',
    'required_with' => ' :attribute مطلوب عندما يكون :values موجوداً.',
    'required_with_all' => ' :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => ' :attribute مطلوب عندما لا تكون :values موجودة.',
    'required_without_all' => ' :attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => ' :attribute و :other يجب أن يتطابقا.',
    'size' => [
        'numeric' => ' :attribute يجب أن يكون :size.',
        'file' => ' :attribute يجب أن يكون :size كيلوبايت.',
        'string' => ' :attribute يجب أن يحتوي على :size حروف.',
        'array' => ' :attribute يجب أن يحتوي على :size عناصر.',
    ],
    'starts_with' => ' :attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => ' :attribute يجب أن يكون نصاً.',
    'timezone' => ' :attribute يجب أن يكون نطاقاً زمنياً صحيحاً.',
    'unique' => ' :attribute مستخدم من قبل.',
    'uploaded' => 'فشل في رفع :attribute.',
    'url' => 'صيغة  :attribute غير صالحة.',
    'uuid' => ' :attribute يجب أن يكون UUID صالح.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */


    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'g-recaptcha-response' => [
            'required' => ' يرجى التحقق من أنك لست روبوتاً.',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader-friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'الاسم',
        'username' => 'اسم المستخدم',
        'email' => 'البريد الإلكتروني',
        'first_name' => 'الاسم الأول',
        'last_name' => 'اسم العائلة',
        'password' => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'new_password' => 'كلمة المرور الجديدة',
        'current_password' => 'كلمة المرور الحالية',
        'city' => 'المدينة',
        'country' => 'الدولة',
        'address' => 'العنوان',
        'phone' => 'رقم الهاتف',
        'mobile' => 'رقم الجوال',
        'age' => 'العمر',
        'gender' => 'الجنس',
        'day' => 'اليوم',
        'month' => 'الشهر',
        'year' => 'السنة',
        'hour' => 'الساعة',
        'minute' => 'الدقيقة',
        'second' => 'الثانية',
        'title' => 'العنوان',
        'content' => 'المحتوى',
        'description' => 'الوصف',
        'excerpt' => 'المقتطف',
        'date' => 'التاريخ',
        'time' => 'الوقت',
        'available' => 'متاح',
        'size' => 'الحجم',
        'price' => 'السعر',
        'quantity' => 'الكمية',
        'category' => 'الفئة',
        'message' => 'الرسالة',
        'image' => 'الصورة',
        'file' => 'الملف',
        'type' => 'النوع',
        'status' => 'الحالة',
        'slug' => 'المعرف النصي',
        'code' => 'الرمز',
        'tags' => 'الوسوم',
        'comment' => 'التعليق',
        'role' => 'الدور',
        'permissions' => 'الصلاحيات',
        'company' => 'الشركة',
        'website' => 'الموقع الإلكتروني',
        'url' => 'الرابط',
        'birthday' => 'تاريخ الميلاد',
        'locale' => 'اللغة',
        'timezone' => 'المنطقة الزمنية',
        'token' => 'رمز التحقق',
        'verification_code' => 'رمز التحقق',
    ],


];
