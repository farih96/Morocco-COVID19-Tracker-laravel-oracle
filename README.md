# COVID-19 TRACKER WITH LARAVEL ,CHARTJS AND ORACLE DATABASE

the app fetch data stored by an admin in an oracle database using yajra/laravel-oci8 package which is an Oracle DB driver for Laravel
the fetched data s displayed using chartsjs.

you will find all the fucntion , procedure, datatype and tables used in database in `.oracle` folder


### how to setup this repo on your machine

 1. `git clone THIS REPO URL`
 2.  cd into the folder and run `composer install`
 3. Install NPM Dependencies  `npm install` or yarn
 4. Create a copy of your .env file `cp .env.example .env`,and fill it with 	  your database information,
 5. Generate an app encryption key `php artisan key:generate`
 6. setup oracel configuration .
 7.  run development server `php artisan serve`

 ## Data Source
all the data in this example is randomly generated with laravel factory 

## Screenshots
<img width="70%"   src="https://lh3.googleusercontent.com/tnaRTDAbhiJB_w8uNphaqjA1m27sz-KAQeSc_6s-lkpUHpw6sgnN3SgKeUxyYWUsjZUSIuhA-mc4B0Ndp8ymviHvs6-lURCjbfugNE1nV3D9eBlsZqiM8UUpIb-JpfNun76E6RflVz-FlVQCuMsU-WOVsYODIuZVHjF-5YAoKP7rngA9klzbRFCUX1AcLVtjo6cUsYY73LlhchOeDsfrAni2ukgnm6EmoDEPjoeVQZz7OuqHqn4uNCCsV_GiqPsswfu1X5jONe0wmvxFv1QiZfUBLq0rBQnVudyUX-uW26sML52ZyxL4Mm2MKBaix-cquU8XDmjF7cJPCoy0s3sy_CjYbH_JkriJL5wdjlZjJx-n9_zLKni86VO_zb8og8IchnZThYuPJ2AZ0wtDdoMdRJX8mxhBFMAlVhZimYrObIMbn3dlcs57QXEo1FULNgLUVWMGVl-sVRT0qbZOFi8qcHs8M8PMzp-8hPSKILUlAfaVEv8Y3nfPI45N9_zSsKq-BLkF0enxoKSCz3Ya5T0tXcaet4Joe28zUTvMABbWQxy6msuINtfAeqW9wxDdUilIKfYvTyCVfCdrBDwpLzZIkNqd9R83qBnutgpS7LsLX_sbyuvJMeAq9JNawoPN2neVpJOEmK5p4pD6i-OrtFrym0zoghz29raSB4KhmsDN_vVC5KQB6ukZi_l8Ik_nxPBRsCihYQ=w1366-h625-ft"  alt="">

<img width="70%" src="https://lh3.googleusercontent.com/lAFtlSRGk0bBI9SulBEz1ikIwbDDlAkS0LtOba4nusa0shawvS3w2FRnE9oIfyPF2GnngdjSMspA5a2Q4ZgSC_LN0f4pMmMA_X4VjuA8V8uNqOd_CSkw-BnP3Et80d-ZXCWaaCpsVd6aBvKpY50x3SPpoHcylny1lzVIlUfh2d23lAaDAm-mfUG5BkdFLLdRdjRpnn12B86d6MNmm4cUiQIt-pk9Cs37P87j4PF3NNOBM51RISSg9SzCymK2-7PG_8VupwNJvDO5CR8A8xgbaT7PoVwm-jy_C5qQXD2RsFXAfYxsHFo11T3WfYQPZ0DRbKw7YwNsIzo3UmHHtKGttwHGQz9rfe-MhyfUtzNIBZjItAbtnbH_XmX3QMspMl9SzzzZGvUSOWQyakjU7j7jUCoXQa464SF_9p79jIpMzCynHHXNQI-tfZk1tFeqqryJzK70ZgofbtdIny9Fdj6jJM9trkf1BAMxdyEny1vZb77AVvc7q6sUpkO77o2kW9_atjzf8qbJf2AI0YYi-5zocpOu3REJ41nUaBqiv1zySdFqoLmsSz-o2PjA8Sn6OwlJyt30sdTd3jqcFB6Ci-fSE9xjJdOzQERp8yPcHx-rHvl-ZjwJDEX4284GMTDmGOpcKMksBjDB7-0_aDpvQ2aMIQQTD_drfgHvD0kXiproEoN8HMt-94d5B4bZ-bdUHTIBjNnt4w=w1366-h625-ft" alt="">

<img width="70%"  src="https://lh3.googleusercontent.com/ySUhrlj7kneX6fk8lebORY1oDPc3qijcvdNJtgFin2yGHxJGhelKf1lSv_OzEYyk4Z74o4z2PSJJL8CRG5H_g6kVMUGQchbf_eDYw03pYnDbuzaEGPJLOTEE90viNFPsUgvF43lttRZph1xdHwKaRXCwwifOU09D-jvy7kgqfnZXALt7J-6g8u9zNS8lTOc-k7fMrr-LKfRwgXIYAknut-hD_b9FGuYqUHfI76LFF6-cXXUXlCZCwHXq3BeIe3wXMGPSyZzZtcjc1MOhshNT9KDMILcRBYwDbgzVi9y07IU1I2fidcv6ZOzGkI58f9P2UybhI_EAYASItTBG98LPiZMkzPn6Ef3pARynbehbIVcAIzCZwB36wvrFEhQwH-1iiAjY5kdGYZmzGjArxIH9Yv98tIdT6VdvepFqZBiDFsHY0Meq5Rgj0RMB7v79qTIiy_A5q-jfTmNTQAqZKDG-7kQS4rg3yOQvmsMNU8IeGVGjo9RAuXPjgrdYFqflelmwH0oBIN7JDbUNfHshAHGpXVOQsqhBwZGprwNkdgGOomWrWqpe9ZGLKP04v8DedqtIYNvKwXnU9C8bJwInkoowQ3-T7Kue0-ezloXeRW77WHhkn51aGCx1nrQ8e_wKoY9NjWFCfrtaFVUm0eXbmWwjRGswt8J2qNlYO_HEZ-RBal8fQhtMNVp1C6CgUe3BcwIAUp6a4A" alt="">

<img  width="70%" src="https://lh3.googleusercontent.com/WBEDyJfnDS7W-M2qNRVL0Zs6kub39ZRT6Uxhi5IJITy1WJwBxVyeT-7P5vCNyh_J_Wld2FmP2TokejPnIt_O" alt="">

<img width="70%"  src="https://lh3.googleusercontent.com/xZ0tl9mcZg22o8ycGGZe-NFruRo_BrSa4LrpHJQpYq7uuCB-DBxuUUmQ7AH9T-kbUWjG3LC6Fz1K0h2q5RzW=w1366-h625" alt="">
