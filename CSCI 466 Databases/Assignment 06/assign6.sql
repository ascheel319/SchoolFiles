##Andrew Scheel
#z1790270
#Section 3

#1
SELECT Owner.LastName, Owner.FirstName, MarinaSlip.BoatName, MarinaSlip.BoatType FROM MarinaSlip, Owner WHERE Owner.OwnerNum = MarinaSlip.OwnerNum;
#2
SELECT Owner.LastName, COUNT(*) FROM Owner LEFT OUTER JOIN MarinaSlip ON Owner.OwnerNum = MarinaSlip.OwnerNum GROUP BY Owner.LastName HAVING COUNT(*) > 1;
#3
SELECT DISTINCT Owner.LastName, ServiceRequest.Description FROM Owner, ServiceRequest, MarinaSlip WHERE MarinaSlip.SlipID = ServiceRequest.SlipID AND Owner.OwnerNum = MarinaSlip.OwnerNum;
#4
SELECT ServiceCategory.CategoryDescription, COUNT(ServiceRequest.CategoryNum) FROM ServiceCategory, ServiceRequest WHERE ServiceCategory.CategoryNum = ServiceRequest.CategoryNum GROUP BY ServiceCategory.CategoryNum;
#5
SELECT Owner.FirstName, Owner.LastName, Owner.City, Owner.State, Marina.Name FROM Owner, Marina, MarinaSlip WHERE Owner.OwnerNum = MarinaSlip.OwnerNum AND Marina.MarinaNum = MarinaSlip.MarinaNum ORDER BY Owner.City, Owner.LastName;
#6
SELECT ALL MarinaSlip.MarinaNum, SUM(MarinaSlip.RentalFee) FROM Marina, MarinaSlip WHERE MarinaSlip.MarinaNum = Marina.MarinaNum GROUP BY MarinaSlip.MarinaNum;
#7
SELECT ServiceRequest.ServiceID 'Service ID', ServiceRequest.EstHours 'Estimated Time To Repair', ServiceRequest.SpentHours 'Hours Spent Working', ServiceRequest.EstHours-ServiceRequest.SpentHours 'Differenc in Hours' FROM ServiceRequest;
#8
SELECT Owner.LastName, MarinaSlip.BoatName, MarinaSlip.Length FROM Owner, MarinaSlip WHERE Owner.OwnerNum = MarinaSlip.OwnerNum AND MarinaSlip.Length <= 30;
#9
SELECT ServiceRequest.NextServiceDate, MarinaSlip.BoatName FROM ServiceRequest, MarinaSlip WHERE ServiceRequest.SlipID = MarinaSlip.SlipID;
#10
SELECT MarinaSlip.BoatName, Owner.LastName, MarinaSlip.SlipNum, Marina.Name FROM MarinaSlip, Owner, Marina WHERE  MarinaSlip.OwnerNum = Owner.OwnerNum AND  MarinaSlip.MarinaNum = Marina.MarinaNum ORDER BY MarinaSlip.BoatName, Marina.Name;
