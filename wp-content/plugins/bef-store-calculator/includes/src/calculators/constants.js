module.exports = {
  forms: {
    businessFormId: 24,
    householdFormId: 26,
    flightFormId: 22,
  },
  tables: {
    BEF_AIRPORTS: 'wp_wpdatatable_24',
    BEF_TRANSPORTATION: 'wp_wpdatatable_35',
    BEF_EGRID_ZIP_SUBREGION: 'wp_wpdatatable_26',
    BEF_EGRID_FACTORS: 'wp_wpdatatable_33',
    BEF_DIET: 'wp_wpdatatable_28',
    BEF_BUILDING_TYPE: 'wp_wpdatatable_29',
    BEF_HOUSEHOLD_TYPE: 'wp_wpdatatable_30',
    BEF_EMISSIONS_FUEL_TYPE: 'wp_wpdatatable_31',
    BEF_CONVERSIONS: 'wp_wpdatatable_34',
  },
  conversionFactor: {
    g_kg: {
      unit: 'g_kg',
      value: 1000,
      description: 'gram per kilogram',
    },
    kg_mt: {
      unit: 'kg_mt',
      value: 1000,
      description: 'kilogram per metric ton',
    },
    ccf_m: {
      unit: 'ccf_m',
      value: 35.3147,
      description: 'standard cubic feet per cubic meters',
    },
    btu_ft: {
      unit: 'btu_ft',
      value: 1024,
      description: 'btu per cubic feet',
    },
    btu_therm: {
      unit: 'btu_therm',
      value: 100000,
      description: 'btu per therm',
    },
    btu_ccf: {
      unit: 'btu_ccf',
      value: 1027,
      description: 'btu per standard cubic feet',
    },
    btu_mmbtu: {
      unit: 'btu_mmbtu',
      value: 1000000,
      description: 'btu per 1m btu',
    },
    tj_mmbtu: {
      unit: 'tj_mmbtu',
      value: 0.001055,
      description: 'terajoules per 1m btu',
    },
    mt_carbon_dioxide_mt_methane: {
      unit: 'mt_carbon_dioxide_mt_methane',
      value: 21,
      description: 'metric ton carbon dioxide per metric ton methane',
    },
    mt_carbon_dioxide_mt_nitrious_dioxode: {
      unit: 'mt_carbon_dioxide_mt_nitrious_dioxode',
      value: 310,
      description: 'metric ton carbon dioxide per metric ton nitrous oxide',
    },
    l_gal: {
      unit: 'l_gal',
      value: 3.78541,
      description: 'liters per gallon',
    },
    btu_gal_diesel: {
      unit: 'btu_gal_diesel',
      value: 138000,
      description: 'btu per gallon diesel',
    },
    btu_gal_gas: {
      unit: 'btu_gal_gas',
      value: 114000,
      description: 'btu per gallon gas',
    },
    ft_ccf: {
      unit: 'ft_ccf',
      value: 100,
      description: 'cubic feet per ccf',
    },
    ft_therms: {
      unit: 'ft_therms',
      value: 97.3709834,
      description: 'cubic feet per therms',
    },
    ft_mmbth: {
      unit: 'ft_mmbth',
      value: 973.7098345,
      description: 'cubic feet per 1m btu',
    },
    ft_mcf: {
      unit: 'ft_mcf',
      value: 1000,
      description: 'cubic feet per 1k cubic feet',
    },
    gal_gal: {
      unit: 'gal_gal',
      value: 1,
      description: 'gallon propane per 1 gallon',
    },
    gal_lb: {
      unit: 'gal_lb',
      value: 0.2380952,
      description: 'gallon propane per lb',
    },
    gal_kg: {
      unit: 'gal_kg',
      value: 0.5249095,
      description: 'gallon propane per kg',
    },
    mile_km: {
      unit: 'mile_km',
      value: 0.621371,
      description: 'mile per km',
    },
    rfi: {
      unit: 'rfi',
      value: 2.7,
      description: 'refractive index',
    },
    lb_kg: {
      unit: 'lb_kg',
      value: 2.20462,
      description: 'lbs per kg',
    },
  },
  emissionTypes: {
    nat_gas_carbon_dioxide: {
      value: 1.884960000,
      desc: 'kg_m',
    },
    nat_gas_methane: {
      value: 0.000168000,
      desc: 'kg_m',
    },
    nat_gas_nitrious_oxide: {
      value: 0.000003360,
      desc: 'kg_m',
    },
    propane_carbon_dioxide: {
      value: 5.790000000,
      desc: 'kg_gal',
    },
    propane_methane: {
      value: 0.000127710,
      desc: 'kg_l',
    },
    propane_nitrious_oxide: {
      value: 0.000002554,
      desc: 'kg_l',
    },
    gas_carbon_dioxide: {
      value: 8.810000000,
      desc: 'kg_gal',
    },
    gas_methane: {
      value: 10.000000000,
      desc: 'kg_tj',
    },
    gas_nitrious_oxide: {
      value: 0.600000000,
      desc: 'kg_tj',
    },
    diesel_carbon_dioxide: {
      value: 10.150000000,
      desc: 'kg_gal',
    },
    diesel_methane: {
      value: 10.000000000,
      desc: 'kg_tj',
    },
    diesel_nitrious_oxide: {
      value: 0.600000000,
      desc: 'kg_tj',
    },
    heating_oil_carbon_dioxide: {
      value: 10.150000000,
      desc: 'kg_gal',
    },
    heating_oil_methane: {
      value: 10.000000000,
      desc: 'kg_gal',
    },
    heating_oil_nitrious_oxide: {
      value: 0.600000000,
      desc: 'kg_gal',
    },
  },
  vehicleEmission: {
    air_domestic: {
      transportation_type: 'air_domestic',
      description: 'Air - Domestic',
      carbondioxide_kg_mile: 0,
      carbondioxide_kg_km: 0.17147,
      methane_g_mile: 0,
      nitriousoxide_g_mile: 0,
    },
    air_short_haul: {
      transportation_type: 'air_short_haul',
      description: 'Air - Short Haul - Seating Unknown',
      carbondioxide_kg_mile: 0,
      carbondioxide_kg_km: 0.097,
      methane_g_mile: 0,
      nitriousoxide_g_mile: 0,
    },
    air_long_haul: {
      transportation_type: 'air_long_haul',
      description: 'Air - Long Haul - Seating Unknown',
      carbondioxide_kg_mile: 0,
      carbondioxide_kg_km: 0.11319,
      methane_g_mile: 0,
      nitriousoxide_g_mile: 0,
    },
    train: {
      transportation_type: 'train',
      description: 'Train - Average (Light Rail and Tram)',
      carbondioxide_kg_mile: 0.163,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.004,
      nitriousoxide_g_mile: 0.002,
    },
    taxi: {
      transportation_type: 'taxi',
      description: 'Taxi',
      carbondioxide_kg_mile: 0.23,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.02,
      nitriousoxide_g_mile: 0.021,
    },
    bus: {
      transportation_type: 'bus',
      description: 'Bus - Type Unknown',
      carbondioxide_kg_mile: 0.107,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0006,
      nitriousoxide_g_mile: 0.0005,
    },
    ferry: {
      transportation_type: 'ferry',
      description: 'Large RoPax Ferry',
      carbondioxide_kg_mile: 0,
      carbondioxide_kg_km: 0.11516,
      methane_g_mile: 0,
      nitriousoxide_g_mile: 0,
    },
    car_gasoline: {
      transportation_type: 'car_gasoline',
      description: 'Passenger Car - Gasoline - Year 2005-present',
      carbondioxide_kg_mile: 8.81,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0147,
      nitriousoxide_g_mile: 0.0079,
    },
    car_diesel: {
      transportation_type: 'car_diesel',
      description: 'Passenger Car - Diesel - Year 1983-present',
      carbondioxide_kg_mile: 10.15,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0005,
      nitriousoxide_g_mile: 0.001,
    },
    pickupTruckVan_cng: {
      transportation_type: 'pickupTruckVan_cng',
      description: 'Light Goods Vehicle - CNG',
      carbondioxide_kg_mile: 5.994,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.737,
      nitriousoxide_g_mile: 0.05,
    },
    pickupTruckVan_ethanol: {
      transportation_type: 'pickupTruckVan_ethanol',
      description: 'Light Goods Vehicle - Ethanol',
      carbondioxide_kg_mile: 1.3215,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.055,
      nitriousoxide_g_mile: 0.067,
    },
    pickupTruckVan_gasoline: {
      transportation_type: 'pickupTruckVan_gasoline',
      description: 'Light Goods Vehicle - Gasoline - Year 2005-present',
      carbondioxide_kg_mile: 8.81,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0157,
      nitriousoxide_g_mile: 0.0101,
    },
    pickupTruckVan_diesel: {
      transportation_type: 'pickupTruckVan_diesel',
      description: 'Light Goods Vehicle - Diesel - Year 1996-present',
      carbondioxide_kg_mile: 10.15,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.001,
      nitriousoxide_g_mile: 0.0015,
    },
    deliveryTruck_gasoline: {
      transportation_type: 'deliveryTruck_gasoline',
      description: 'Heavy Duty Vehicle - Rigid - Gasoline - Year 2005-present',
      carbondioxide_kg_mile: 8.81,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0326,
      nitriousoxide_g_mile: 0.0177,
    },
    deliveryTruck_diesel: {
      transportation_type: 'deliveryTruck_diesel',
      description: 'Heavy Duty Vehicle - Rigid - Diesel - Year 1960-present',
      carbondioxide_kg_mile: 10.15,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0051,
      nitriousoxide_g_mile: 0.0048,
    },
    deliveryTruck_cng: {
      transportation_type: 'deliveryTruck_cng',
      description: 'Heavy Duty Vehicle - Rigid - CNG',
      carbondioxide_kg_mile: 5.994,
      carbondioxide_kg_km: 0,
      methane_g_mile: 1.966,
      nitriousoxide_g_mile: 0.175,
    },
    deliveryTruck_ethanol: {
      transportation_type: 'deliveryTruck_ethanol',
      description: 'Heavy Duty Vehicle - Rigid - Ethanol',
      carbondioxide_kg_mile: 1.3215,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.197,
      nitriousoxide_g_mile: 0.175,
    },
    semiBigRig_gasoline: {
      transportation_type: 'semiBigRig_gasoline',
      description: 'Heavy Duty Vehicle - Articulated - Gasoline - Year 2005-present',
      carbondioxide_kg_mile: 8.81,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0326,
      nitriousoxide_g_mile: 0.0177,
    },
    semiBigRig_diesel: {
      transportation_type: 'semiBigRig_diesel',
      description: 'Heavy Duty Vehicle - Articulated - Diesel - Year 1960-present',
      carbondioxide_kg_mile: 10.15,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.0051,
      nitriousoxide_g_mile: 0.0048,
    },
    semiBigRig_cng: {
      transportation_type: 'semiBigRig_cng',
      description: 'Heavy Duty Vehicle - Articulated - CNG',
      carbondioxide_kg_mile: 5.994,
      carbondioxide_kg_km: 0,
      methane_g_mile: 1.966,
      nitriousoxide_g_mile: 0.175,
    },
    semiBigRig_ethanol: {
      transportation_type: 'semiBigRig_ethanol',
      description: 'Heavy Duty Vehicle - Articulated - Ethanol',
      carbondioxide_kg_mile: 1.3215,
      carbondioxide_kg_km: 0,
      methane_g_mile: 0.197,
      nitriousoxide_g_mile: 0.175,
    },
  },
  buildingTypes: {
    college_university: {
      building_type: 'college_university',
      description: 'College or university',
      fuel_oil_gallon_sqft: 0.09,
      nat_gas_ccf_sqft: 0.448,
      water_gallon_sqft: 14.6,
      electric_kwh_sqft: 17.4,
    },
    prek_12: {
      building_type: 'prek_12',
      description: 'preK-12',
      fuel_oil_gallon_sqft: 0.09,
      nat_gas_ccf_sqft: 0.267,
      water_gallon_sqft: 14.6,
      electric_kwh_sqft: 9.8,
    },
    grocery_convenience: {
      building_type: 'grocery_convenience',
      description: 'Grocery or Convenience Store',
      fuel_oil_gallon_sqft: 0.05,
      nat_gas_ccf_sqft: 0.613,
      water_gallon_sqft: 12.6,
      electric_kwh_sqft: 48.7,
    },
    restaurant: {
      building_type: 'restaurant',
      description: 'Restaurant',
      fuel_oil_gallon_sqft: 0.05,
      nat_gas_ccf_sqft: 1.78,
      water_gallon_sqft: 26.25,
      electric_kwh_sqft: 43.5,
    },
    bar_pub_lounge: {
      building_type: 'bar_pub_lounge',
      description: 'Bar, pub, or lounge',
      fuel_oil_gallon_sqft: 0.05,
      nat_gas_ccf_sqft: 0.92,
      water_gallon_sqft: 24.9,
      electric_kwh_sqft: 26.3,
    },
    impatient_health_care: {
      building_type: 'impatient_health_care',
      description: 'Inpatient Health Care',
      fuel_oil_gallon_sqft: 0.05,
      nat_gas_ccf_sqft: 1.011,
      water_gallon_sqft: 49.6,
      electric_kwh_sqft: 31,
    },
    outpatient_health_care: {
      building_type: 'outpatient_health_care',
      description: 'Outpatient Health Care',
      fuel_oil_gallon_sqft: 0.05,
      nat_gas_ccf_sqft: 0.38,
      water_gallon_sqft: 15.6,
      electric_kwh_sqft: 18.7,
    },
    health_care_office: {
      building_type: 'health_care_office',
      description: 'Health Care Office',
      fuel_oil_gallon_sqft: 0.02,
      nat_gas_ccf_sqft: 0.225,
      water_gallon_sqft: 14.6,
      electric_kwh_sqft: 16,
    },
    lodging: {
      building_type: 'lodging',
      description: 'Lodging',
      fuel_oil_gallon_sqft: 0.03,
      nat_gas_ccf_sqft: 0.438,
      water_gallon_sqft: 41.7,
      electric_kwh_sqft: 15.3,
    },
    nursing_home_assisted_living: {
      building_type: 'nursing_home_assisted_living',
      description: 'Nursing home or assisted living',
      fuel_oil_gallon_sqft: 0.03,
      nat_gas_ccf_sqft: 0.628,
      water_gallon_sqft: 41.7,
      electric_kwh_sqft: 18.4,
    },
    retail: {
      building_type: 'retail',
      description: 'Retail Store',
      fuel_oil_gallon_sqft: 0.12,
      nat_gas_ccf_sqft: 0.199,
      water_gallon_sqft: 12.6,
      electric_kwh_sqft: 15.4,
    },
    vehicle_dealership: {
      building_type: 'vehicle_dealership',
      description: 'Vehicle dealership',
      fuel_oil_gallon_sqft: 0.12,
      nat_gas_ccf_sqft: 0.335,
      water_gallon_sqft: 12.6,
      electric_kwh_sqft: 14,
    },
    shopping_center: {
      building_type: 'shopping_center',
      description: 'Shopping center',
      fuel_oil_gallon_sqft: 0.06,
      nat_gas_ccf_sqft: 0.47,
      water_gallon_sqft: 11.8,
      electric_kwh_sqft: 21.1,
    },
    office: {
      building_type: 'office',
      description: 'Office',
      fuel_oil_gallon_sqft: 0.02,
      nat_gas_ccf_sqft: 0.268,
      water_gallon_sqft: 14.6,
      electric_kwh_sqft: 15.9,
    },
    library: {
      building_type: 'library',
      description: 'Library',
      fuel_oil_gallon_sqft: 0.03,
      nat_gas_ccf_sqft: 0.339,
      water_gallon_sqft: 25.7,
      electric_kwh_sqft: 15.2,
    },
    entertainment_culture_center: {
      building_type: 'entertainment_culture_center',
      description: 'Entertainment or Cultural Center',
      fuel_oil_gallon_sqft: 0.03,
      nat_gas_ccf_sqft: 0.307,
      water_gallon_sqft: 25.7,
      electric_kwh_sqft: 16,
    },
    recreation: {
      building_type: 'recreation',
      description: 'Recreation Center',
      fuel_oil_gallon_sqft: 0.03,
      nat_gas_ccf_sqft: 0.349,
      water_gallon_sqft: 25.7,
      electric_kwh_sqft: 13.1,
    },
    social_meeting_room: {
      building_type: 'social_meeting_room',
      description: 'Social or Meeting Rooms',
      fuel_oil_gallon_sqft: 0.03,
      nat_gas_ccf_sqft: 0.349,
      water_gallon_sqft: 25.7,
      electric_kwh_sqft: 10.2,
    },
    public_order_fire_police: {
      building_type: 'public_order_fire_police',
      description: 'Public order, Fire and Police Stations',
      fuel_oil_gallon_sqft: 0.02,
      nat_gas_ccf_sqft: 0.395,
      water_gallon_sqft: 42.1,
      electric_kwh_sqft: 14.9,
    },
    religious_worship: {
      building_type: 'religious_worship',
      description: 'Religious worship',
      fuel_oil_gallon_sqft: 0.1,
      nat_gas_ccf_sqft: 0.281,
      water_gallon_sqft: 25.7,
      electric_kwh_sqft: 5.2,
    },
    post_office_postal_center: {
      building_type: 'post_office_postal_center',
      description: 'Post office or postal center',
      fuel_oil_gallon_sqft: 0.16,
      nat_gas_ccf_sqft: 0.427,
      water_gallon_sqft: 14.6,
      electric_kwh_sqft: 9.2,
    },
    vehicle_service_repair: {
      building_type: 'vehicle_service_repair',
      description: 'Vehicle service or repair',
      fuel_oil_gallon_sqft: 0.16,
      nat_gas_ccf_sqft: 0.423,
      water_gallon_sqft: 20.3,
      electric_kwh_sqft: 8.7,
    },
    service_repair_salon_dry_cleaner_copy: {
      building_type: 'service_repair_salon_dry_cleaner_copy',
      description: 'Service (Repair, Salon, Dry Cleaner, Copy, etc)',
      fuel_oil_gallon_sqft: 0.16,
      nat_gas_ccf_sqft: 0.651,
      water_gallon_sqft: 20.3,
      electric_kwh_sqft: 9.6,
    },
    warehouse: {
      building_type: 'warehouse',
      description: 'Warehouse',
      fuel_oil_gallon_sqft: 0.02,
      nat_gas_ccf_sqft: 0.22,
      water_gallon_sqft: 3.4,
      electric_kwh_sqft: 6.6,
    },
    self_storage_units: {
      building_type: 'self_storage_units',
      description: 'Self storage units',
      fuel_oil_gallon_sqft: 0.02,
      nat_gas_ccf_sqft: 0.194,
      water_gallon_sqft: 3.4,
      electric_kwh_sqft: 4.6,
    },
    laboratory: {
      building_type: 'laboratory',
      description: 'Laboratory',
      fuel_oil_gallon_sqft: 0.05,
      nat_gas_ccf_sqft: 1.141,
      water_gallon_sqft: 20.3,
      electric_kwh_sqft: 40.8,
    },
  },
  householdTypes: {
    sqft_1000: {
      building_type: 'sqft_1000',
      description: 'Fewer than 1,000',
      electric_kwh_sqft: 6627,
      fuel_oil_mt_sqft: 2.37,
      nat_gas_mt_sqft: 1.466,
      propane_mt_sqft: 1,
    },
    sqft_1000_1499: {
      building_type: 'sqft_1000_1499',
      description: '1,000 to 1,499',
      electric_kwh_sqft: 10015,
      fuel_oil_mt_sqft: 2.91,
      nat_gas_mt_sqft: 2.37,
      propane_mt_sqft: 1.27,
    },
    sqft_1500_1999: {
      building_type: 'sqft_1500_1999',
      description: '1,500 to 1,999',
      electric_kwh_sqft: 11716,
      fuel_oil_mt_sqft: 4.29,
      nat_gas_mt_sqft: 3.001,
      propane_mt_sqft: 1.64,
    },
    sqft_2000_2499: {
      building_type: 'sqft_2000_2499',
      description: '2,000 to 2,499',
      electric_kwh_sqft: 11604,
      fuel_oil_mt_sqft: 4.84,
      nat_gas_mt_sqft: 3.649,
      propane_mt_sqft: 2.47,
    },
    sqft_2500_2999: {
      building_type: 'sqft_2500_2999',
      description: '2,500 to 2,999',
      electric_kwh_sqft: 12271,
      fuel_oil_mt_sqft: 6.05,
      nat_gas_mt_sqft: 4.018,
      propane_mt_sqft: 1.93,
    },
    sqft_3000: {
      building_type: 'sqft_3000',
      description: '3,000 or greater',
      electric_kwh_sqft: 14210,
      fuel_oil_mt_sqft: 6.4,
      nat_gas_mt_sqft: 4.574,
      propane_mt_sqft: 2.75,
    },
  },
  dietTypes: {
    meat_heavy: {
      diet_type: 'meat_heavy',
      description: 'Meat - Heavy',
      carbon_dioxide_meal_day: 5.283739267,
    },
    meat_mod: {
      diet_type: 'meat_mod',
      description: 'Meat - Moderate',
      carbon_dioxide_meal_day: 4.137336867,
    },
    meat_low: {
      diet_type: 'meat_low',
      description: 'Meat - Low',
      carbon_dioxide_meal_day: 3.431858467,
    },
    pescatarian: {
      diet_type: 'pescatarian',
      description: 'Pescatarian',
      carbon_dioxide_meal_day: 2.873354733,
    },
    vegetarian: {
      diet_type: 'vegetarian',
      description: 'Vegetarian',
      carbon_dioxide_meal_day: 2.7998674,
    },
    vegan: {
      diet_type: 'vegan',
      description: 'Vegan',
      carbon_dioxide_meal_day: 2.123783933,
    },
  },
  egridFactors: {
    AKGD: {
      egrid: 'AKGD',
      subregion_name: 'ASCC Alaska Grid',
      carbon_dioxide_lb_mwh: 1039.635,
      methane_lb_gwh: 0.082,
      nitrous_oxide_factor_lb_gwh: 0.011,
      est_carbon_dioxide_lb_mhw: 1044.989,
    },
    AKMS: {
      egrid: 'AKMS',
      subregion_name: 'ASCC Miscellaneous',
      carbon_dioxide_lb_mwh: 525.083,
      methane_lb_gwh: 0.024,
      nitrous_oxide_factor_lb_gwh: 0.004,
      est_carbon_dioxide_lb_mhw: 526.963,
    },
    ERCT: {
      egrid: 'ERCT',
      subregion_name: 'ERCOT All',
      carbon_dioxide_lb_mwh: 931.672,
      methane_lb_gwh: 0.066,
      nitrous_oxide_factor_lb_gwh: 0.009,
      est_carbon_dioxide_lb_mhw: 936.082,
    },
    FRCC: {
      egrid: 'FRCC',
      subregion_name: 'FRCC All',
      carbon_dioxide_lb_mwh: 931.842,
      methane_lb_gwh: 0.066,
      nitrous_oxide_factor_lb_gwh: 0.009,
      est_carbon_dioxide_lb_mhw: 936.145,
    },
    HIMS: {
      egrid: 'HIMS',
      subregion_name: 'HICC Miscellaneous',
      carbon_dioxide_lb_mwh: 1110.689,
      methane_lb_gwh: 0.118,
      nitrous_oxide_factor_lb_gwh: 0.018,
      est_carbon_dioxide_lb_mhw: 1119.077,
    },
    HIOA: {
      egrid: 'HIOA',
      subregion_name: 'HICC Oahu',
      carbon_dioxide_lb_mwh: 1669.943,
      methane_lb_gwh: 0.18,
      nitrous_oxide_factor_lb_gwh: 0.027,
      est_carbon_dioxide_lb_mhw: 1682.596,
    },
    MROE: {
      egrid: 'MROE',
      subregion_name: 'MRO East',
      carbon_dioxide_lb_mwh: 1678.016,
      methane_lb_gwh: 0.169,
      nitrous_oxide_factor_lb_gwh: 0.025,
      est_carbon_dioxide_lb_mhw: 1689.651,
    },
    MROW: {
      egrid: 'MROW',
      subregion_name: 'MRO West',
      carbon_dioxide_lb_mwh: 1239.848,
      methane_lb_gwh: 0.138,
      nitrous_oxide_factor_lb_gwh: 0.02,
      est_carbon_dioxide_lb_mhw: 1249.201,
    },
    NYLI: {
      egrid: 'NYLI',
      subregion_name: 'NPCC Long Island',
      carbon_dioxide_lb_mwh: 1184.241,
      methane_lb_gwh: 0.139,
      nitrous_oxide_factor_lb_gwh: 0.018,
      est_carbon_dioxide_lb_mhw: 1193.091,
    },
    NEWE: {
      egrid: 'NEWE',
      subregion_name: 'NPCC New England',
      carbon_dioxide_lb_mwh: 522.312,
      methane_lb_gwh: 0.082,
      nitrous_oxide_factor_lb_gwh: 0.011,
      est_carbon_dioxide_lb_mhw: 527.564,
    },
    NYCW: {
      egrid: 'NYCW',
      subregion_name: 'NPCC NYC/Westchester',
      carbon_dioxide_lb_mwh: 596.414,
      methane_lb_gwh: 0.022,
      nitrous_oxide_factor_lb_gwh: 0.003,
      est_carbon_dioxide_lb_mhw: 597.762,
    },
    NYUP: {
      egrid: 'NYUP',
      subregion_name: 'NPCC Upstate NY',
      carbon_dioxide_lb_mwh: 253.112,
      methane_lb_gwh: 0.018,
      nitrous_oxide_factor_lb_gwh: 0.002,
      est_carbon_dioxide_lb_mhw: 253.889,
    },
    RFCE: {
      egrid: 'RFCE',
      subregion_name: 'RFC East',
      carbon_dioxide_lb_mwh: 715.966,
      methane_lb_gwh: 0.061,
      nitrous_oxide_factor_lb_gwh: 0.008,
      est_carbon_dioxide_lb_mhw: 719.979,
    },
    RFCM: {
      egrid: 'RFCM',
      subregion_name: 'RFC Michigan',
      carbon_dioxide_lb_mwh: 1312.56,
      methane_lb_gwh: 0.129,
      nitrous_oxide_factor_lb_gwh: 0.018,
      est_carbon_dioxide_lb_mhw: 1321.185,
    },
    RFCW: {
      egrid: 'RFCW',
      subregion_name: 'RFC West',
      carbon_dioxide_lb_mwh: 1166.096,
      methane_lb_gwh: 0.117,
      nitrous_oxide_factor_lb_gwh: 0.017,
      est_carbon_dioxide_lb_mhw: 1174.029,
    },
    SRMW: {
      egrid: 'SRMW',
      subregion_name: 'SERC Midwest',
      carbon_dioxide_lb_mwh: 1664.15,
      methane_lb_gwh: 0.185,
      nitrous_oxide_factor_lb_gwh: 0.027,
      est_carbon_dioxide_lb_mhw: 1676.782,
    },
    SRMV: {
      egrid: 'SRMV',
      subregion_name: 'SERC Mississippi Valley',
      carbon_dioxide_lb_mwh: 854.645,
      methane_lb_gwh: 0.055,
      nitrous_oxide_factor_lb_gwh: 0.008,
      est_carbon_dioxide_lb_mhw: 858.369,
    },
    SRSO: {
      egrid: 'SRSO',
      subregion_name: 'SERC South',
      carbon_dioxide_lb_mwh: 1027.928,
      methane_lb_gwh: 0.081,
      nitrous_oxide_factor_lb_gwh: 0.012,
      est_carbon_dioxide_lb_mhw: 1033.471,
    },
    SRTV: {
      egrid: 'SRTV',
      subregion_name: 'SERC Tennessee Valley',
      carbon_dioxide_lb_mwh: 1031.537,
      methane_lb_gwh: 0.097,
      nitrous_oxide_factor_lb_gwh: 0.014,
      est_carbon_dioxide_lb_mhw: 1038.127,
    },
    SRVC: {
      egrid: 'SRVC',
      subregion_name: 'SERC Virginia/Carolina',
      carbon_dioxide_lb_mwh: 743.328,
      methane_lb_gwh: 0.067,
      nitrous_oxide_factor_lb_gwh: 0.009,
      est_carbon_dioxide_lb_mhw: 747.513,
    },
    SPNO: {
      egrid: 'SPNO',
      subregion_name: 'SPP North',
      carbon_dioxide_lb_mwh: 1163.187,
      methane_lb_gwh: 0.124,
      nitrous_oxide_factor_lb_gwh: 0.018,
      est_carbon_dioxide_lb_mhw: 1171.606,
    },
    SPSO: {
      egrid: 'SPSO',
      subregion_name: 'SPP South',
      carbon_dioxide_lb_mwh: 1166.582,
      methane_lb_gwh: 0.091,
      nitrous_oxide_factor_lb_gwh: 0.013,
      est_carbon_dioxide_lb_mhw: 1172.755,
    },
    CAMX: {
      egrid: 'CAMX',
      subregion_name: 'WECC California',
      carbon_dioxide_lb_mwh: 496.536,
      methane_lb_gwh: 0.034,
      nitrous_oxide_factor_lb_gwh: 0.004,
      est_carbon_dioxide_lb_mhw: 498.686,
    },
    NWPP: {
      egrid: 'NWPP',
      subregion_name: 'WECC Northwest',
      carbon_dioxide_lb_mwh: 639.037,
      methane_lb_gwh: 0.064,
      nitrous_oxide_factor_lb_gwh: 0.009,
      est_carbon_dioxide_lb_mhw: 643.363,
    },
    RMPA: {
      egrid: 'RMPA',
      subregion_name: 'WECC Rockies',
      carbon_dioxide_lb_mwh: 1273.615,
      methane_lb_gwh: 0.123,
      nitrous_oxide_factor_lb_gwh: 0.018,
      est_carbon_dioxide_lb_mhw: 1281.944,
    },
    AZNM: {
      egrid: 'AZNM',
      subregion_name: 'WECC Southwest',
      carbon_dioxide_lb_mwh: 1022.355,
      methane_lb_gwh: 0.077,
      nitrous_oxide_factor_lb_gwh: 0.011,
      est_carbon_dioxide_lb_mhw: 1027.548,
    },
    USAVG: {
      egrid: 'USAVG',
      subregion_name: 'US Average',
      carbon_dioxide_lb_mwh: 947.182,
      methane_lb_gwh: 0.085,
      nitrous_oxide_factor_lb_gwh: 0.012,
      est_carbon_dioxide_lb_mhw: 952.877,
    },
  },
};