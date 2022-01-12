@extends('layouts.main')
@section('title', $land_owner->name_nepali . 'को विवरण')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ $land_owner->name_nepali . 'को कृषिको विवरण' }}</p>
                </div>
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <button class="btn btn-sm btn-primary float-right d-print-none" onclick="window.print();"><i
                            class="fas fa-print px-1"></i>{{ __('प्रिन्ट गर्नुहोस्') }}</button>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h5 class="text-center font-weight-bold"></h5>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td class="text-center">{{ __('पुरा नाम (नेपालीमा)') }}</td>
                        <td class="text-center">{{ $land_owner->name_nepali }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('पुरा नाम (अंग्रेजीमा)') }}</td>
                        <td class="text-center">{{ $land_owner->name_english }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('उमेर') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->age) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('जारी मिति') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->issue_dateBs) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('नागरिकता नं') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->cit_no) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('जारी गरिएको कार्यलय') }}</td>
                        <td class="text-center">{{ $land_owner->issue_office }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('जन्म मिति') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->birth_dateBs) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('मातृभाषा') }}</td>
                        <td class="text-center">{{ $land_owner->mother_tongue }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('सम्पर्क / मोबाईलन नं') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->contact_no) }}</td>
                    </tr>
                </tbody>
            </table>
            
            <table class="table table-bordered my-3">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('परिबारको संख्या') }}</th>
                        <th class="text-center">{{ __('१८ बर्ष मुनिका') }}</th>
                        <th class="text-center">{{ __('१८ देखि ५९ सम्मको') }}</th>
                        <th class="text-center">{{ __('६० देखि देखि माथिको') }}</th>
                        <th class="text-center">{{ __('कैफियत (अपाङ्ग / असक्त)') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($land_owner->landOwnerFamilyDetail->toArray() as $key => $landOwnerFamilyDetail)
                        <tr>
                            <td class="text-center">{{ $landOwnerFamilyDetail['gender']['name'] }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['below_18']) }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['18_to_59']) }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['above_60']) }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['remark']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table table-bordered table-striped my-4">
                <tbody>
                    <tr>
                        <td class="text-center">{{ __('बैवाहिक स्थिति') }}</td>
                        <td class="text-center">{{ $land_owner->maritalStatus->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('दम्पतिको नाम') }}</td>
                        <td class="text-center">{{ $land_owner->couple_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('दम्पतिको नागरिकता नं') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->couple_cit_no) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('बाबुको नाम थर') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->father_name) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('आमाको नाम थर') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->mother_name) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('बाबुको नागरिकता नं') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->father_cit_no) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('आमाको नागरिकता नं') }}</td>
                        <td class="text-center">{{ Nepali($land_owner->mother_cit_no) }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('ब्यबसाय') }}</td>
                        <td class="text-center">{{ $land_owner->Business->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{ __('शैक्षिक योग्यता') }}</td>
                        <td class="text-center">{{ $land_owner->educationQualification->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-center font-weight-bold" colspan="2">{{__('स्थायी ठेगाना')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('प्रदेश')}}</td>
                        <td class="text-center">{{Nepali($land_owner->landOwnerPermanentAddress->Province->NepaliName)}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('जिल्ला')}}</td>
                        <td class="text-center">{{$land_owner->landOwnerPermanentAddress->District->NepaliName}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('गा.पा/ना.पा')}}</td>
                        <td class="text-center">{{$land_owner->landOwnerPermanentAddress->Municipality->NepaliName}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('वडा नं')}}</td>
                        <td class="text-center">{{Nepali($land_owner->landOwnerPermanentAddress->ward)}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('बिदेशिको हकमा देश')}}</td>
                        <td class="text-center">{{$land_owner->landOwnerPermanentAddress->country_name}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('राहदानी नं')}}</td>
                        <td class="text-center">{{Nepali($land_owner->landOwnerPermanentAddress->passport_no)}}</td>
                    </tr>
                    <tr>
                        <td class="text-center font-weight-bold" colspan="2">{{__('अस्थायी ठेगाना')}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('प्रदेश')}}</td>
                        <td class="text-center">{{Nepali($land_owner->landOwnerTemporaryAddress->Province->NepaliName)}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('जिल्ला')}}</td>
                        <td class="text-center">{{$land_owner->landOwnerTemporaryAddress->District->NepaliName}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('गा.पा/ना.पा')}}</td>
                        <td class="text-center">{{$land_owner->landOwnerTemporaryAddress->Municipality->NepaliName}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('वडा नं')}}</td>
                        <td class="text-center">{{Nepali($land_owner->landOwnerTemporaryAddress->ward)}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('बिदेशिको हकमा देश')}}</td>
                        <td class="text-center">{{$land_owner->landOwnerTemporaryAddress->country_name}}</td>
                    </tr>
                    <tr>
                        <td class="text-center">{{__('राहदानी नं')}}</td>
                        <td class="text-center">{{Nepali($land_owner->landOwnerTemporaryAddress->passport_no)}}</td>
                    </tr>
                    <tr>
                        <td class="text-center font-weight-bold" colspan="2">{{__('बैंक विवरण')}}</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered my-3">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('क्र.सं.') }}</th>
                        <th class="text-center">{{ __('बैंक नाम') }}</th>
                        <th class="text-center">{{ __('खाता नं') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($land_owner->landOwnerFamilyDetail->toArray() as $key => $landOwnerFamilyDetail)
                        <tr>
                            <td class="text-center">{{ $landOwnerFamilyDetail['gender']['name'] }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['below_18']) }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['18_to_59']) }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['above_60']) }}</td>
                            <td class="text-center">{{ Nepali($landOwnerFamilyDetail['remark']) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table table-bordered table-striped my-4">
                <tbody>
                    <tr>
                        <td class="text-center">{{ __('परिवारको सदस्य बैदेशिक रोजगारमा') }}</td>
                        <td class="text-center">{{ $land_owner->is_foreign ? 'रहेको' :'नरहेको' }}</td>
                    </tr>
                    @if ($land_owner->is_foreign)
                        <tr>
                            <td class="text-center">{{ __('देशको नाम') }}</td>
                            <td class="text-center">{{ $land_owner->country_name}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">{{ __('जम्मा') }}</td>
                            <td class="text-center">{{ Nepali($land_owner->foreign_member)}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <hr class="w-100">
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
